<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doorprize - Kukar Idaman</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/kukar.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/animated-headlines/css/jquery.animatedheadline.css">
</head>

<style>
    body {
        background-image: url("<?php echo base_url('assets') . '/dist/img/bukapuasa2024_pincel_app.png'; ?>");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: top;
        background-size: cover;
        background-color: #dddddd;
    }

	.register-box {
    width: 350px;
	}

	.login-box-msg {
		padding: 0px 20px;
	}

	@media screen and (min-width: 480px) {
	
	.register-box {
    width: 560px;
	}
	}
    .card {
        margin-right: auto;
        margin-left: auto;
        box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);
        border-radius: 5px;
        backdrop-filter: blur(14px);
        background-color: rgba(255, 255, 255, 0.8);
        padding: 10px;
        text-align: center;
    }

    .huge {
        border-color:#a33;
		border-width: thick;
		border-radius: 10px;
        font-size: 6rem;
        font-weight: bold;
        margin: 0 0 0 0;
        padding: 0px 10px 10px 10px;
        width: 100%;
        text-align: center;
    }

    .textshadow .blurry-text {
        color: transparent;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
    }

	.row {
		justify-content: center;
	}

	.pemenang {
		height: 120px;
		display: flex;
        margin: auto;
        align-items:center;
        justify-content:center;
	}

	.btn-success, .btn-light, .btn-danger {
		height: 70px;
	}

    ul.cloud {
        list-style: none;
        padding-left: 0;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        line-height: 2.5rem;
    }

    ul.cloud a {
        color: #a33;
        display: block;
        font-size: 1.5rem;
        padding: 0.125rem 0.25rem;
        text-decoration: none;
        position: relative;
    }

    ul.cloud a[data-weight="1"] {
        --size: 1;
    }

    ul.cloud a[data-weight="2"] {
        --size: 2;
    }

    ul.cloud a[data-weight="3"] {
        --size: 3;
    }

    ul.cloud a[data-weight="4"] {
        --size: 4;
    }

    ul.cloud a[data-weight="5"] {
        --size: 5;
    }

    ul.cloud a[data-weight="6"] {
        --size: 6;
    }

    ul.cloud a[data-weight="7"] {
        --size: 7;
    }

    ul.cloud a[data-weight="8"] {
        --size: 8;
    }

    ul.cloud a[data-weight="9"] {
        --size: 9;
    }

    ul.cloud a {
        --size: 4;
        font-size: calc(var(--size) * 0.25rem + 0.5rem);
        /* ... */
        opacity: calc((15 - (9 - var(--size))) / 15);
    }

    ul.cloud a:focus {
        outline: 1px dashed;
    }

    ul.cloud a::before {
        content: "";
        position: absolute;
        top: 0;
        left: 50%;
        width: 0;
        height: 100%;
        background: var(--color);
        transform: translate(-50%, 0);
        opacity: 0.15;
        transition: width 0.25s;
    }

    ul.cloud a:focus::before,
    ul.cloud a:hover::before {
        width: 100%;
    }

    ul.cloud[data-show-value] a::after {
        content: " ("attr(data-weight) ")";
        font-size: 1rem;
    }

    ul.cloud li:nth-child(2n+1) a {
        --color: #181;
    }

    ul.cloud li:nth-child(3n+1) a {
        --color: #33a;
    }

    ul.cloud li:nth-child(4n+1) a {
        --color: #c38;
    }

    @media (prefers-reduced-motion) {
        ul.cloud * {
            transition: none !important;
        }
    }


	.box 
		{
			position: relative;
			border-radius: 10px;
			padding: 2px;

		}
		.box:before 
		{
			content: '';
			z-index: -1;
			position: absolute;
			top: -2px;
			left: -2px;
			height: calc(100% + 4px);
			width: calc(100% + 4px);
			filter: blur(5px);
			transform-origin: top right; 
  			background: linear-gradient(-45deg, #ffffff, #c82333);
			animation: animatee 2s linear infinite;
			transition: opacity .3s ease-in-out;
		}
		.box:after 
		{
			content: '';
			z-index: -1;
			position: absolute;
			top: -2px;
			left: -2px;
			height: calc(100% + 4px);
			width: calc(100% + 4px);
			filter: blur(5px);
			transform-origin: top right; 
  			background: linear-gradient(-45deg, #ffffff, #c82333);
			animation: animatee 2s linear infinite;
			background-size: 200%;
			transition: opacity .1s ease-in-out;
		}

@keyframes animatee {
  0% { background-position: 800% 0; }
  50% { background-: 0% 0; }
  100% { background-position: 0% 0; }
}

</style>

<body class="hold-transition register-page">
