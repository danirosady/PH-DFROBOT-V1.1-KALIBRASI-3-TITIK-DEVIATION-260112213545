#include <EEPROM.h>
#include <math.h>

#define SensorPin A0
#define ArrayLength 40

int pHArray[ArrayLength];
int pHArrayIndex = 0;

int ph4ADC = 0, ph7ADC = 0, ph10ADC = 0;

void setup() {
  Serial.begin(9600);
  Serial.println("\n=== DFRobot pH Sensor Calibration with Deviation Check ===");
  Serial.println("Commands:");
  Serial.println("  calph4  -> Calibrate with pH 4.00 buffer");
  Serial.println("  calph7  -> Calibrate with pH 7.00 buffer");
  Serial.println("  calph10 -> Calibrate with pH 10.00 buffer");
  Serial.println("  showcal -> Show saved calibration data");
  Serial.println("==========================================================\n");

  // Baca data kalibrasi dari EEPROM
  EEPROM.get(0, ph4ADC);
  EEPROM.get(2, ph7ADC);
  EEPROM.get(4, ph10ADC);

  Serial.println("Loaded calibration data:");
  Serial.print("  pH4 ADC  = "); Serial.println(ph4ADC);
  Serial.print("  pH7 ADC  = "); Serial.println(ph7ADC);
  Serial.print("  pH10 ADC = "); Serial.println(ph10ADC);
  Serial.println();

  if (ph4ADC == 0 && ph7ADC == 0 && ph10ADC == 0) {
    Serial.println("⚠️ No calibration data found. Please calibrate first.\n");
  }
}

void loop() {
  static unsigned long samplingTime = millis();
  static unsigned long printTime = millis();

  // Baca sensor secara periodik
  if (millis() - samplingTime > 30) {
    pHArray[pHArrayIndex++] = analogRead(SensorPin);
    if (pHArrayIndex == ArrayLength) pHArrayIndex = 0;
    samplingTime = millis();
  }

  // Tampilkan data tiap 1 detik
  if (millis() - printTime > 1000) {
    int adcValue = averageArray(pHArray, ArrayLength);
    float voltage = adcValue * 5.0 / 1024.0;
    float deviation = calcDeviation(pHArray, ArrayLength);

    // Deteksi probe tidak terendam / pembacaan tidak valid
    if (deviation > 20 || voltage < 0.2 || voltage > 4.8) {
      Serial.print("⚠️ Invalid reading (deviation: ");
      Serial.print(deviation, 1);
      Serial.println(") — Probe not in solution!");
    } else {
      float pHValue = getpHValue(adcValue);
      Serial.print("ADC: "); Serial.print(adcValue);
      Serial.print(" | Volt: "); Serial.print(voltage, 2);
      Serial.print(" | Dev: "); Serial.print(deviation, 1);
      Serial.print(" | pH: "); Serial.println(pHValue, 2);
    }

    printTime = millis();
  }

  // Baca perintah dari Serial
  if (Serial.available() > 0) {
    String cmd = Serial.readStringUntil('\n');
    cmd.trim();

    if (cmd.equalsIgnoreCase("calph4")) {
      ph4ADC = analogRead(SensorPin);
      EEPROM.put(0, ph4ADC);
      Serial.print("✅ Saved pH4 calibration: ADC = "); Serial.println(ph4ADC);
    }

    else if (cmd.equalsIgnoreCase("calph7")) {
      ph7ADC = analogRead(SensorPin);
      EEPROM.put(2, ph7ADC);
      Serial.print("✅ Saved pH7 calibration: ADC = "); Serial.println(ph7ADC);
    }

    else if (cmd.equalsIgnoreCase("calph10")) {
      ph10ADC = analogRead(SensorPin);
      EEPROM.put(4, ph10ADC);
      Serial.print("✅ Saved pH10 calibration: ADC = "); Serial.println(ph10ADC);
    }

    else if (cmd.equalsIgnoreCase("showcal")) {
      Serial.println("📋 Current calibration data:");
      Serial.print("  pH4 ADC  = "); Serial.println(ph4ADC);
      Serial.print("  pH7 ADC  = "); Serial.println(ph7ADC);
      Serial.print("  pH10 ADC = "); Serial.println(ph10ADC);
    }

    else {
      Serial.println("Unknown command. Use calph4, calph7, calph10, or showcal.");
    }
  }
}

// ---------------------- Fungsi Pendukung ----------------------

float getpHValue(int adcValue) {
  if (ph4ADC == 0 || ph7ADC == 0 || ph10ADC == 0) return -1;

  float m1 = (7.0 - 4.0) / (ph7ADC - ph4ADC);
  float m2 = (10.0 - 7.0) / (ph10ADC - ph7ADC);

  if (adcValue <= ph4ADC) return 4.0;
  if (adcValue >= ph10ADC) return 10.0;

  if (adcValue < ph7ADC)
    return 4.0 + m1 * (adcValue - ph4ADC);
  else
    return 7.0 + m2 * (adcValue - ph7ADC);
}

// Rata-rata sampel
double averageArray(int* arr, int number) {
  long sum = 0;
  for (int i = 0; i < number; i++) sum += arr[i];
  return (double)sum / number;
}

// Simpangan baku (deviation)
float calcDeviation(int* arr, int number) {
  double avg = averageArray(arr, number);
  double sumSq = 0;
  for (int i = 0; i < number; i++) {
    sumSq += pow(arr[i] - avg, 2);
  }
  return sqrt(sumSq / number);
}
