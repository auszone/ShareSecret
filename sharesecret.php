<?php
session_start();
include("mysqlInc2.php");
error_reporting(4);
?>
<html>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<head>
	<title>SHARE SECRET</title>
	<meta charset="UTF-8">
	<style>
	
	@font-face {
    	font-family: "SECRET FONT";
    	src: url(http://m101.nthu.edu.tw/~s101062161/fonts/topsecret.ttf) format("truetype");
	}
	
	a:link {color:#880000;}    /* unvisited link */
	a:visited {color:#880000;} /* visited link */
	a:hover {color:#A50000;}   /* mouse over link */
	a:active {color:#A6A6A6;}  /* selected link */
	
	/* background color */
	html{
		height: 100%;
		/* background: radial-gradient(circle, #1C1C1C 30%, #000000); */
		background: radial-gradient(circle, #2E2E2E 10%, #1C1C1C);
		background-size: cover;
	}
	input{
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		border:none;
	}
	input:focus {
    	outline: none;
	}
	
	/* The SHARE button */
	.share_button{
		margin-top:0px;
		display: block;
		width: 180px;
		height: 40px;
		background: #440000;
		border-radius: 3px;
		box-shadow: 0px 4px rgba(100, 100, 100, 0.5);
		margin: 0 7px 11px 0;
		color: #000000;
		font: 30px "SECRET FONT";
		line-height: 43px;
		text-align: center;
		user-select: none;
		
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-ms-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
		
		-webkit-transition: left 1.5s ease;
		-moz-transition: left 1.5s ease;
		-ms-transition: left 1.5s ease;
		-o-transition: left 1.5s ease;
		transition: left 1.5s ease;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		
		cursor: default;
	}
	.share_button:active{
		box-shadow: 0px 0px rgba(100, 100, 100, 0.5);
	    margin-top: 4px;
	}
	.share_button:hover{
		background: #660000;
		color: #222222;
	}
	
	/* time and read LIMIT below secret folder */
	wordfont12{
		opacity:1; 
		font: 12px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#666666;
		position:absolute;
		text-align:center;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		
		-webkit-transition: all 0.5s ease;
		-moz-transition: all 0.5s ease;
		-ms-transition: all 0.5s ease;
		-o-transition: all 0.5s ease;
		transition: all 0.5s ease;
		
		cursor: default;
	}
	
	/* "LIMIT text" font below textarea */
	wordfont11{
		opacity:1; 
		font: 13px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#666666;
		position:absolute;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
		
		cursor: default;
	}
	
	/* REFRESH SECRETS button */
	.loopback {
    	width: 20px;
    	height: 10px;
    	border-style: solid;
    	border-width: 6px 6px 0 6px;
    	border-color: #555555;
    	border-radius: 100px 100px 0 0;
    	position: absolute;
    	top: 16px;
    	right: 4px;
    	-webkit-transition: all 0.2s ease;
    	-moz-transition: all 0.2s ease;
    	-ms-transition: all 0.2s ease;
    	-o-transition: all 0.2s ease;
    	transition: all 0.2s ease;
    	-webkit-animation:loopStart 0.5s;
	}
	.loopback:after {
    	content: '';
    	width: 10px;
    	height: 10px;
    	border-style: solid;
    	border-width: 0 6px 6px 0;
    	border-color: #555555;
    	border-radius: 0 0 100px 0;
    	position: absolute;
    	left: 10px;
    	top: 10px;
	}
	.loopback:before {
    	content: '';
    	position: absolute;
    	width: 0;
    	height: 0;
    	border-style: solid;
    	border-width: 8px;
    	border-color: transparent #555555 transparent transparent;
    	top: 14px;
    	right: 10px;
	}
	.loopback:hover {
		opacity:0.6;
		-webkit-transform: scale(1.1,1.1);
	}
	.loopback:active {
		-webkit-transform: rotate(179deg) scale(0.9,0.9);
		opacity:1;
		margin-top:18px;
		margin-left:5px;
	}
	@-webkit-keyframes loopStart{
		0% {-webkit-transform: scale(0,0)}
		50% {-webkit-transform: scale(1.2,1.2)}
		100% {-webkit-transform: scale(1,1)}
	}
	@-moz-keyframes loopStart{
		0% {-moz-transform: scale(0,0)}
		50% {-moz-transform: scale(1.2,1.2)}
		100% {-moz-transform: scale(1,1)}
	}
	@-ms-keyframes loopStart{
		0% {-ms-transform: scale(0,0)}
		50% {-ms-transform: scale(1.2,1.2)}
		100% {-ms-transform: scale(1,1)}
	}
	@-o-keyframes loopStart{
		0% {-o-transform: scale(0,0)}
		50% {-o-transform: scale(1.2,1.2)}
		100% {-o-transform: scale(1,1)}
	}
	@keyframes loopStart{
		0% {transform: scale(0,0)}
		50% {transform: scale(1.2,1.2)}
		100% {transform: scale(1,1)}
	}
	
	/* "The secret you are about to share" font below textarea */
	#font10{
		opacity:1; 
		font: 13px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#666666;
		position:absolute;
		top:560px;
		left:-595px;
		
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		
		cursor: default;
	}
	
	/* "Hello stranger. Would you like to login?" font above textarea */
	#font9{
		opacity:1; 
		font: 13px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#888888;
		position:absolute;
		top:30px;
		left:-595px;
		
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		
		cursor: default;
	}
	
	/* window for reading secrets */
	secretwindow{
		display:block;
		height:700px;
		width:1280px;
		position:absolute;
		top:0px;
		left:0px;
		background-color:#000000;
		opacity:0;
		z-index:-1;
		-webkit-transition: all 0.5s ease;
		-moz-transition: all 0.5s ease;
		-ms-transition: all 0.5s ease;
		-o-transition: all 0.5s ease;
		transition: all 0.5s ease;
	}
	
	/* notes for textarea display login user readonly tag */
	.notes3{
        background-image: -webkit-linear-gradient(left, #555555 10px, transparent 10px), -webkit-linear-gradient(right, #555555 10px, transparent 10px), -webkit-linear-gradient(#555555 18px, #ccc 18px, #555555 19px, #ccc 19px);
        background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        /*background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
        background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
        background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
        background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);*/
        background-size: 100% 100%, 100% 100%, 100% 19px;
        border: 1px solid #CCCCCC;
        border-radius: 8px;
        box-shadow: 4px 4px 7px rgba(100, 100, 100, 0.59);
        line-height: 16px;
        font-weight:bold;
        /* font-family: Arial, Helvetica, Sans-serif; */
        font: 15px "Courier New";
        color:#DDDDDD;
        padding-top:20px;
        padding-left:11px;
        width:550px;
        height:200px;
        max-width:550px;
        max-height:200px;
        -webkit-transition: all 1.5s ease;
        -moz-transition: all 1.5s ease;
        -ms-transition: all 1.5s ease;
        -o-transition: all 1.5s ease;
        transition: all 1.5s ease;
        
        -webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		z-index:4;
    }
    .notes2:focus{
        outline:none;
    }
	
	/* notes for textarea display readonly tag */
	.notes2{
        background-image: -webkit-linear-gradient(left, #555555 10px, transparent 10px), -webkit-linear-gradient(right, #555555 10px, transparent 10px), -webkit-linear-gradient(#555555 18px, #ccc 18px, #555555 19px, #ccc 19px);
        background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        /*background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
        background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
        background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
        background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);*/
        background-size: 100% 100%, 100% 100%, 100% 19px;
        border: 1px solid #CCCCCC;
        border-radius: 8px;
        box-shadow: 4px 4px 7px rgba(100, 100, 100, 0.59);
        line-height: 16px;
        font-weight:bold;
        /* font-family: Arial, Helvetica, Sans-serif; */
        font: 15px "Courier New";
        color:#DDDDDD;
        padding-top:20px;
        padding-left:11px;
        width:550px;
        height:500px;
        max-width:550px;
        max-height:500px;
        -webkit-transition: all 1.5s ease;
        -moz-transition: all 1.5s ease;
        -ms-transition: all 1.5s ease;
        -o-transition: all 1.5s ease;
        transition: all 1.5s ease;
        
        -webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		z-index:4;
    }
    .notes2:focus{
        outline:none;
    }
	
	/* notes for textarea */
	.notes{
        background-image: -webkit-linear-gradient(left, #555555 10px, transparent 10px), -webkit-linear-gradient(right, #555555 10px, transparent 10px), -webkit-linear-gradient(#555555 18px, #ccc 18px, #555555 19px, #ccc 19px);
        background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 18px, #ccc 18px, white 19px, #ccc 19px);
        /*background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
        background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
        background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
        background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);*/
        background-size: 100% 100%, 100% 100%, 100% 19px;
        border: 1px solid #CCCCCC;
        border-radius: 8px;
        box-shadow: 4px 4px 7px rgba(100, 100, 100, 0.59);
        line-height: 16px;
        font-weight:bold;
        /* font-family: Arial, Helvetica, Sans-serif; */
        font: 15px "Courier New";
        color:#DDDDDD;
        padding-top:20px;
        padding-left:11px;
        width:550px;
        height:500px;
        max-width:550px;
        max-height:500px;
        -webkit-transition: all 1.5s ease;
        -moz-transition: all 1.5s ease;
        -ms-transition: all 1.5s ease;
        -o-transition: all 1.5s ease;
        transition: all 1.5s ease;
    }
    .notes:focus{
        outline:none;
    }
	
	/* recall icon */
	.recall{
    	font-size:16px;
    	display:block;
    	position:relative;
    	width:3em;
    	height:3em;
    	border-top: 0.4em solid #555555;
    	border-left: 0.4em solid #555555;
    	border-right: 0.4em solid transparent;
    	border-bottom: 0.4em dotted transparent;
    	-moz-transform:rotate(150deg);
    	-webkit-transform:rotate(150deg);
    	-o-transform:rotate(150deg);
    	transform:rotate(150deg);
    	-webkit-border-radius:1.5em;
    	-ms-border-radius:1.5em;
    	-o-border-radius:1.5em;
    	border-radius:1.5em;
    	-moz-box-sizing: border-box;
    	-webkit-box-sizing: border-box;
    	-ms-box-sizing: border-box;
    	box-sizing: border-box;
    	-webkit-transition: all 1.5s ease;
    	-moz-transition: all 1.5s ease;
        -ms-transition: all 1.5s ease;
        -o-transition: all 1.5s ease;
        transition: all 1.5s ease;
        cursor: default;
	}
	.recall:after{
		content: '';
		position: absolute;
		top: 0;
		right: 0;
		margin: -0.15em -0.45em 0 0;
		border-top: 0.5em solid #555555;
		border-left: 0.5em solid transparent;
		border-right: 0.5em solid transparent;
		border-bottom: 0.5em solid transparent;
		-moz-transform: rotate(-45deg);
		-webkit-transform: rotate(-45deg);
		-o-transform: rotate(-45deg);
		transform: rotate(-45deg);
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
        -ms-transition: all 1.5s ease;
        -o-transition: all 1.5s ease;
        transition: all 1.5s ease;
        cursor: default;
	}
	.recall::before {
 		-webkit-box-sizing: border-box;
 		-o-box-sizing: border-box;
 		-moz-box-sizing: border-box;
		box-sizing: border-box;
		left: -0.45em;
		border-radius: 100%;
		top: -0.4em;
		display: block;
		position: absolute;
		content: "";
		width: 3em;
		height: 3em;
		border-bottom: 0.4em dotted #555555;
		border-top: 0.4em dotted transparent;
		border-left: 0.4em dotted transparent;
		border-right: 0.4em dotted transparent;
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
        -ms-transition: all 1.5s ease;
        -o-transition: all 1.5s ease;
        transition: all 1.5s ease;
        cursor: default;
	}
	
	/* compose icon */
	.compose {
		font-size: 20px;
		width: 2em;
		height: 1.5em;
		background: #444444;
		border-radius: 0.2em;
		position: relative;
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
        -ms-transition: all 1.5s ease;
        -o-transition: all 1.5s ease;
        transition: all 1.5s ease;
        cursor: default;
	}
	.compose::before {
		position:absolute;	
		content: "";
		bottom: -0.3em;
		right: 0.4em;
		width:0em;
		height:0em;
		border-bottom:0.4em solid transparent;
		border-left:0.4em solid #444444;
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
        -ms-transition: all 1.5s ease;
        -o-transition: all 1.5s ease;
        transition: all 1.5s ease;
        cursor: default;
	}
	
	/* folder open icon */
	.file{
		margin-top:58px;
		margin-left:38px;
		font-size: 10px;
		opacity:0;
		border-top: 0.2em solid #666666;
		position: relative;
		width: 1em;
		height: 2em;
		border-right: 0.2em solid #666666;
		border-bottom: 0.2em solid #666666;
		box-shadow: 4px 4px 7px rgba(0, 0, 0, 0.59);
		
		-webkit-transition: all 0.5s ease;
    	-moz-transition: all 0.5s ease;
    	-ms-transition: all 0.5s ease;
    	-o-transition: all 0.5s ease;
    	transition: all 0.5s ease;
	}
	.file::before{
		bottom: -0.2em;
		left: -0.5em;
		position: absolute;
		width: 0.5em;
		height: 1.72em;
		border-left: 0.2em solid #666666;
		border-bottom: 0.2em solid #666666;
		content: "";
	}
	.file::after{
		top: -0.2em;
		left: -0.50em;
		position: absolute;
		border-right: 0.5em solid #666666;
		border-top: 0.5em solid transparent;
		content: "";
	}
	.file:hover{
    	opacity: 0.8;
    	-webkit-transition-duration: 0.2s;
		-moz-transition-duration: 0.2s;
        -ms-transition-duration: 0.2s;
        -o-transition-duration: 0.2s;
        transition-duration: 0.2s;
		margin-top: 60px;
    	margin-left: 40px;
    	cursor: default;
	}
	.file:active{
		opacity: 1;
		-webkit-transition-duration: 0.2s;
		-moz-transition-duration: 0.2s;
        -ms-transition-duration: 0.2s;
        -o-transition-duration: 0.2s;
        transition-duration: 0.2s;
    	margin-top: 62px;
    	margin-left: 42px;
    	cursor: default;
	}
	
	/* folder icon */
	.folder{
    	width: 75px;
    	height: 52.5px;
    	margin: 0 auto;
    	margin-top: 50px;
    	position: relative;
    	background-color: #666666;
    	border-radius: 0 6px 6px 6px;
    	box-shadow: 4px 4px 7px rgba(0, 0, 0, 0.59);
    	-webkit-transition: all 0.2s ease;
    	-moz-transition: all 0.2s ease;
    	-ms-transition: all 0.2s ease;
    	-o-transition: all 0.2s ease;
    	transition: all 0.2s ease;
    	opacity: 0.6;
    	-webkit-animation:folderStart 0.5s;
    	-moz-animation:folderStart 0.5s;
    	-ms-animation:folderStart 0.5s;
    	-o-animation:folderStart 0.5s;
    	animation:folderStart 0.5s;
    	cursor: default;
	}
	.folder:before{
    	content: '';
    	width: 50%;
    	height: 12px;
    	border-radius: 0 20px 0 0;
    	background-color: #666666;
    	position: absolute;
    	top: -6px;
    	left: 0px;
    	opacity: 0.7;
    	-webkit-transition: all 0.2s ease;
    	-moz-transition: all 0.2s ease;
    	-ms-transition: all 0.2s ease;
    	-o-transition: all 0.2s ease;
    	transition: all 0.2s ease;
    	cursor: default;
	}
	.folder:hover{
    	opacity: 0.8;
    	width: 85px;
    	height: 60.5px;
    	margin-top: 43px;
    	margin-left: -1px;
    	cursor: default;
	}
	.folder:active{
		opacity: 1;
		width: 75px;
    	height: 53.5px;
    	margin-top: 48px;
    	margin-left: 1px;
    	cursor: default;
	}
	/* folder icon starting animation */
	@-webkit-keyframes folderStart{
		0% {width: 0px; height: 0px; margin-top: 80px; margin-left: 40px;}
		50% {width: 112.5px; height: 78.75px; margin-top: 30px; margin-left: -20px;}
		100% {width: 75px; height: 52.5px; margin-top: 50px; margin-left: 0px;}
	}
	@-moz-keyframes folderStart{
		0% {width: 0px; height: 0px; margin-top: 80px; margin-left: 40px;}
		50% {width: 112.5px; height: 78.75px; margin-top: 30px; margin-left: -20px;}
		100% {width: 75px; height: 52.5px; margin-top: 50px; margin-left: 0px;}
	}
	@-ms-keyframes folderStart{
		0% {width: 0px; height: 0px; margin-top: 80px; margin-left: 40px;}
		50% {width: 112.5px; height: 78.75px; margin-top: 30px; margin-left: -20px;}
		100% {width: 75px; height: 52.5px; margin-top: 50px; margin-left: 0px;}
	}
	@-o-keyframes folderStart{
		0% {width: 0px; height: 0px; margin-top: 80px; margin-left: 40px;}
		50% {width: 112.5px; height: 78.75px; margin-top: 30px; margin-left: -20px;}
		100% {width: 75px; height: 52.5px; margin-top: 50px; margin-left: 0px;}
	}
	@keyframes folderStart{
		0% {width: 0px; height: 0px; margin-top: 80px; margin-left: 40px;}
		50% {width: 112.5px; height: 78.75px; margin-top: 30px; margin-left: -20px;}
		100% {width: 75px; height: 52.5px; margin-top: 50px; margin-left: 0px;}
	}
	
	/* "These are your secrets." font */
	#font15{
		opacity:1; 
		font: 13px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#555555;
		
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		
		cursor: default;
	}
	
	/* "Recall." font */
	#font8{
		opacity:1; 
		font: 13px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#555555;
		position:absolute;
		bottom:195px;
		left:18px;
		
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		
		cursor: default;
	}
	
	/* "Share." font */
	#font7{
		opacity:1; 
		font: 13px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#444444;
		position:absolute;
		bottom:15px;
		left:18px;
		
		-webkit-transition: all 1.5s ease;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		
		cursor: default;
	}
	
	/* "Hello stranger." font */
	#font6{
		opacity:0.3; 
		font: 12px "Courier New";
		/* font-family:"Courier New", Courier, monospace; */
		color:#888888;
		position:absolute;
		top:150px;
		left:190px;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
		
		cursor: default;
	}
	#font6:hover{
		opacity:1;
		-webkit-transform: scale(1.1);
		-moz-transform: scale(1.1);
		-ms-transform: scale(1.1);
		-o-transform: scale(1.1);
		transform: scale(1.1);
	}
		
	
	/* Middle Big "SECRET" font */
	#font5{
		display:block;
		opacity:0.1; 
		font: 300px "SECRET FONT";
		/* font-family:"Courier New", Courier, monospace; */
		color:#2E2E2E;
		position:absolute;
		top:-20%;
		left:50%;
		margin-left:-550px;
		cursor: default;
	}
	
	/* "Log In" font */
	#font4{
		display:block;
		opacity:0; 
		font: 20px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#444444;
		position:absolute;
		top:30px;
		left:50%;
		margin-left:-70px;
		
		-webkit-transition: opacity 1.5s ease;
		-moz-transition: opacity 1.5s ease;
		-ms-transition: opacity 1.5s ease;
		-o-transition: opacity 1.5s ease;
		transition: opacity 1.5s ease;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		cursor: pointer;
	}
	
	/* "|" font */
	#font3a{
		display:block;
		opacity:0; 
		font: 20px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#444444;
		position:absolute;
		top:30px;
		left:50%;
		margin-left:20px;
		
		-webkit-transition: opacity 1.5s ease;
		-moz-transition: opacity 1.5s ease;
		-ms-transition: opacity 1.5s ease;
		-o-transition: opacity 1.5s ease;
		transition: opacity 1.5s ease;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		cursor: default;
	}
	
	/* "Contact Us" font */
	#font3{
		display:block;
		opacity:0; 
		font: 20px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#444444;
		position:absolute;
		top:30px;
		left:50%;
		margin-left:40px;
		
		-webkit-transition: opacity 1.5s ease;
		-moz-transition: opacity 1.5s ease;
		-ms-transition: opacity 1.5s ease;
		-o-transition: opacity 1.5s ease;
		transition: opacity 1.5s ease;
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		cursor: pointer;
	}
	
	/* "SHARE SECRET" font */
	#font2{
		font: 70px "SECRET FONT";
		color:#000000;
		/* background: radial-gradient(circle, #2E2E2E 30%, #585858); */
		position:absolute;
		top:-40px;
		left: 50%;
		margin-left:-260px;
		text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.59);
		
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		cursor: default;
	}
	
	/* "Your secret is safe with us." font */
	#font1{
		font: 13px "Courier New";
		font-weight:bold;
		/* font-family:"Courier New", Courier, monospace; */
		color:#292929;
		position:absolute;
		top:95px;
		left:50%;
		margin-left:-120px;

		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
		cursor: default;
	}
	
	/* title block */
	block1{
		position:absolute;
		top:0px;
		left:0px;
		display:block;
		width:200px; 
		height:100px; 
		/* background: radial-gradient(circle, #000000 1%, #1C1C1C); */
		background-color:#1C1C1C;
		/* box-shadow: 4px 5px 0px 0px rgba(50, 50, 50, 0.5); */
		/* border-radius: 10px; */
	}
	
	/* left banner "recall" */
	banner4{
		position:absolute;
		bottom:170px;
		left:-5px;
		display:block;
		width:75px; 
		height:185px; 
		background-color:#1A1A1A;
		border-radius:5px;
		box-shadow: 4px 4px 7px rgba(0, 0, 0, 0.59);
		/* box-shadow: 4px 4px #3E621D, 0px 0px 0px rgba(0, 0, 0, 0.2); */
		-webkit-transition: width 1.5s ease;
		-moz-transition: width 1.5s ease;
		-ms-transition: width 1.5s ease;
		-o-transition: width 1.5s ease;
		transition: width 1.5s ease;
	}
	banner4:hover{
		left:630px;
	}
	banner5{
		position:absolute;
		top:0px;
		left:-5px;
		display:block;
		width:0px; 
		height:100%; 
		background-color:#1A1A1A;
		border-radius:10px;
		box-shadow: 4px 4px 7px rgba(0, 0, 0, 0.59);
		/* box-shadow: 4px 4px #3E621D, 0px 0px 0px rgba(0, 0, 0, 0.2); */
	}
	banner5:hover{
		width:645px;
	}
	
	/* left banner "share" */
	banner2{
		position:absolute;
		bottom:0%;
		left:-5px;
		display:block;
		width:75px; 
		height:175px; 
		background-color:#000000;
		border-radius:5px;
		box-shadow: 4px 4px 7px rgba(0, 0, 0, 0.59);
		/* box-shadow: 4px 4px #3E621D, 0px 0px 0px rgba(0, 0, 0, 0.2); */
		-webkit-transition: width 1.5s ease;
		-moz-transition: width 1.5s ease;
		-ms-transition: width 1.5s ease;
		-o-transition: width 1.5s ease;
		transition: width 1.5s ease;
	}
	banner2:hover{
		left:630px;
	}
	banner3{
		position:absolute;
		top:0px;
		left:-5px;
		display:block;
		width:0px; 
		height:100%; 
		background-color:#000000;
		border-radius:10px;
		box-shadow: 4px 4px 7px rgba(0, 0, 0, 0.59);
		/* box-shadow: 4px 4px #3E621D, 0px 0px 0px rgba(0, 0, 0, 0.2); */
	}
	banner3:hover{
		width:645px;
	}
	
	/* top banner */
	banner1{
		position:absolute;
		top:0px;
		left:50%;
		margin-left:-270px;
		display:block;
		width:540px; 
		height:0px; 
		background-color:#000000;
		border-radius:10px;
		box-shadow: 4px 4px 7px rgba(0, 0, 0, 0.59);
		/* box-shadow: 4px 4px #3E621D, 0px 0px 0px rgba(0, 0, 0, 0.2); */
	}
	banner1:hover{
		height:130px;
	}
	
	#banner_trans1{
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
	}
	#banner_trans2{
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
	}
	#banner_trans3{
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
	}
	#banner_trans4{
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
	}
	#banner_trans5{
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
	}
	#counter{
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
	}
	#timer{
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
	}
	
	.divanimation{
		-webkit-transition: all 1.5s ease;
		-moz-transition: all 1.5s ease;
		-ms-transition: all 1.5s ease;
		-o-transition: all 1.5s ease;
		transition: all 1.5s ease;
	}
	
	#fold1{position:absolute; left:59%; top:18%;}
	#openfold1{position:absolute; left:59%; top:18%;}
	#fold2{position:absolute; left:59%; top:45%;}
	#openfold2{position:absolute; left:59%; top:45%;}
	#fold3{position:absolute; left:59%; top:72%;}
	#openfold3{position:absolute; left:59%; top:72%;}
	
	#fold4{position:absolute; left:71%; top:18%;}
	#fold5{position:absolute; left:71%; top:45%;}
	#fold6{position:absolute; left:71%; top:72%;}
	#openfold4{position:absolute; left:71%; top:18%;}
	#openfold5{position:absolute; left:71%; top:45%;}
	#openfold6{position:absolute; left:71%; top:72%;}
	
	#fold7{position:absolute; left:83%; top:18%;}
	#fold8{position:absolute; left:83%; top:45%;}
	#fold9{position:absolute; left:83%; top:72%;}
	#openfold7{position:absolute; left:83%; top:18%;}
	#openfold8{position:absolute; left:83%; top:45%;}
	#openfold9{position:absolute; left:83%; top:72%;}
	
	</style>
</head>


<body>
	<pre style="font:6px/3px monospace; position:absolute; top:50px; left:-150px; color:#2E2E2E; opacity:1;">                                       ````````````````````````````````````````````````.....................``````````````````````````````````````````````````.,,::;;;;;;;;;;;;';::;;;;;;;:;;;;;;:;;;;:,
                                           `    `   `````````````````````````````````````..`..............``       `` ````````````````````````````````````````````.,:::;;;;;;;;';;::;;;;;;;;;;;;;;::;':,
                                           ``   ` `` ```````````````````````````````````````.....`.`.....`            `   `` ``````````````````` `` `````````````````.,,,;;;;;;;;;;:;;;;;;;;;;;;;;::::,,
                                           ``     ` `````````````````````````````````````````...``.```.`                        `  `````````` ``` `````  ``````````````...:::;;;;;::;;;;;;;;;;;;;;;::;:,
                                                     ````````````````````````````````````````..``````.                             ``` ``````````````` `  ` ``````````````...:;;;;;:;;;;;;;;;;;;;;;::::,
                                                   ` ````````````````````````````````````````.```````                   ```          ``````` ``````````````` ````````````````.,:;;;:::;;;;;;;;;;;;;;::;,
                                                      ````````````````````````````````````````````.                                  ` ` ``` ````` `````````````````````````````..,::::;;;;;;;;;;;;;::;.
                                                ` `` `````````````````````````````````````````````                                        ``   ``  `````````` ` ``` ``````````````.,,::;;;;;;;;;;;;;;::`
                                                   ` ``````````..`..````````````` ```````````````                                             `  `  `````````` ````` ```````````````.,,;;;;;;;;;;;;;;:,`
                                                 ``` `````````````.```.`````````````````````````                                                 ` ` ` ```````````````````````````````..;;;;;;;;;;;;;;;`
                                                ```` ```````````````````````````  ``````` `````                                                   ` ````````````````````````````````````.,;;;;;;;;;;;;;`
                                                 `````````````````..````````````  `````  ````                                                        ````````````````````````````````````..:;;;;;;;;;;;.
                                                 ````````````````...```````````   ```````` `                                                       ` `  ```````` ``````````````````````````..:;;;;;;;;;,
                                                  `````````````````````````````    ````````                                                          `      ` ```````````````````````````````.:;;;;;;;:;
                                                  ````````````````````````````     ````````                                                 `  ```````````` ` ````````````````````````````````..,:;;;;;;
                                                  ```````````````````````````       ``````                                             ``........``.`````.`` `````` ````````````````````````````..,;;;;:
                                                  `  ```````````````````````        `` ``                                          ``.,,..,,,,,......```...```.`````  ```````````````````````````.`..,,.
                                                      `````````` ``````````         ````                                        ``...,.,,.,,,.........```````....,``` `` ```````````````````````````...`
                                                         ` `  ````  ``````      `  `````                                      ``.................``..,,.`........,.```````` ` ``````````````````````````
                                                           `` `      ```` `      ``````                                  `..```..........,,::,,..``..,,,,,...````,.````.````````  ``````````````````````
                                                               ``    ````        `````                                  `,...`.......:;;;;;;;::::,.......,,...```,`````....```     `````````````````````
                                                                        `        ````                                  ,::,..`....,:;;,,,,:,,,,,::,,,.....,....``.,`````.....` `     ` `````````````````
                                                                                `````                                `,,::,..``..:;:,,,,,::::::::,,::,,....,......,````....,,..`      ` ````````````````
                                                                                ````                                ,,,::::.````::,,,,,::;:::::::::::;:,.....,....,````..,.,,...`   `   ````````````````
                                                                            ```````                                ,,,:::::.```,:,,,,,:::::::::::::;::;;:,,.......:,.``,.,.,,,..,.```    ```````````````
                                                                                 ``                               ,:::::::,,``,,:,,,:;:::::::::::::::::;;:::,.....:,...``...,,.,,::```   ```````````````
                                                                              ` ```                              `:;::::::,``,::::::::::::::::::::::::;;;;;::.....:,........,,,.::::,``     ````````````
                                                                            ``````                               ::::::::,``,:::::::::::::::::::::::::::;;;;::....::........,,.,:::;::`` ```````````````
                                                                            ``````                              ,:;::::::``.::::::::::::::::::::::::::::;;;;;;::..:,..,.....,,.,:::::::```  ````````````
                                                                            `````                             `.,::::::,```:,::::::,::::::::::::::::::::;;;;;;;;:::,..::::::::::;;;;;;:,`` `````````````
                                                                            `````                             .,:;::::::``.:::::::::::::::::::::::::::::;;;;;;;;;;:;::::::::::,::;;;;;;::```````````````
                                                                           `````                             ..::;::::::``::,:::::::::::;:::;:::::::::::;;;;;;;;;:::,;;;;,,,,,,,::;''';:::``````````````
                                                                          ``````                            `.,:;;;:;::,`.::::::::::::;;::::::::::;:;;;;;;;;;';;::::::::::,,,,,,::;;''':::.````  `````` 
                                                                      `   ``````                            ,,,,.::::::``,::::::::::::;::::::....,::::;;;;;;;';::::;::::::,,,,,,:::;''';;::````  ````` `
                                                                      ` ```````                            `:,,`,:::::.``,::::::::::::::::.``````..,,::;;;;;;;:::::;:::,:::,,,,:::::;''';:::````````````
                                                                     ` ````````                           `,:,..:::;:..``,:::,::::;;;:::.`` ` ````,,,,.:;;';;;::::,:::::::::::::::::;;''':::.`` ````````
                                                                     ` ````````                           .::,.:,::;.,` `,:::::::::;;::.` `  `````,,,,.`.;;;;:::::,,:;:,::::::::,,:::;''';:::```````````
                                                                     `````````                            ,::`::.:::,.  .,::::::::::::,`     ```.,:,,,,.`.;;;::::::,:::::,::::::,,,::'''';:::,```````` `
                                                                      ````````                           `::,,:::::..   ,,::::::::::::`    ``.::;;:;;:,.``.::;;:::,,,:::;::::;;;'''''''''';:::````````  
                                                                       ```````                          `,;:,,,.:;:,`   ,,:::::::::::``  ``.,,,..:::::;.``.;:;::::,:,:::;''''''''''''''''''';:,`````````
                                                                     `````````                          `::.,,`:::,.    ,:::::::;;;::`  `.,,..,:,,.:::;.```,:;;::::,,,;'''''''''''''''''''''''::`````` `
                                                                      ```````                           ,::;:,.:;,.`    ,::::::;;;;::```,,`:;;;'';;,:;;,```.:;;:::,,,:;'''''''''''''''''''''''';,,``````
                                                                    ` ```````                           ;;,::.:::..    `,::::::::;;;,``.:.;;',,'::;;;;;;```.:;;::::,,:;'''''''''''';';';'''''''';,,,````
                                                                      ```````                          `;::::.::..`    `,::::,::;;::,`.;,:;;;;;;;::;;;;;```.::::,,:::::'''''''''';';;''''''''''';:,,,```
                                                                      ```````                          ,:.;:.:::::     `::::,:::;;;:,,.;;,.;;;;:;:,;;;;:```.:::::::::::;''''';';;;;';;'''''''''';';,,,``
                                                                    ``` ````                           :::;;.:::::`    `::;:,:::::;;,,```..``.`````,:;:,.``.::::::::::::'''';'';;;;;;;;;';'''''''';,,,``
                                                                  ````` ````                          `:::;::::::.`    `::::,:::::;::,,```````````.;::::.``:::::::::::::'';''';;;;;;;;;;';'''''''''',,,`
                                                                  `` ```````                          `::;;;,::,,``    `::::,:::::;:;,,.`````````.,:;:::...::::::::,....'';;';;;;;;;;;';';'''';'''';,,,`
                                                                 `` ````````                         ``:;;:;:::,,`     `,:::::::::::::,,..````...,:::::,..::::::::,,,,,,;;;;';;;;;;;;;;'';;''';''''':,,.
                                                                  ` ````````                          .;;;;;::::..     `.;,:,,:::::::;,,,........,:::,,.`;;;::::::,.....;;;'';;;;;;;;;;';';';;;'''';;,,`
                                                                 `` ````````                          ,;;;;;;;::..     `.;,:,,::::::::;,,,.......,::,,.`;;;;:::::,......:;''';;;;;;;;;;''''''''';'';,..`
                                                                 ``````````                           :;;'';;;;:..     `.,,,,,:::::;;:;:,,:.......,,,.:';;;;:::;,........';;';;;;';';;'''''''''';';;,```
                                                                 ``````````                          `:;;;';';;:..     `.,:,,:::::;;:;:;:,,,,,...,,,:;;;;:;;;:::.........:;;;;;;;''';'''''''''''''';:```
                                                                 `` ````````                         `:;:;;;'';;,`      .,,:::::::::;:::;':::::::;:;';;;;;;;;::.....`.``..';;;;;;''';'''''''''''''';:```
                                                                ````````````                         `..,:;''';;:``   ```.,:,:::::;:;::;;:;:::'';';;;;;;;;;;;;,.......``..';;;;;;;';'';'''';'';'''';,```
                                                                   `````````                         `..,,:;;;;;,`    ```.:::::::;:;:;:;;;;::,;:;;;;;;;;;;;;;,.....``.....,';;;;;;''''''''';''''''';;```
                                                                ````````````                        ` ```,,;;;;;..  `````.,:,::::::;:;:;;;;;::,;;';;;;;;;;;;,..............;;;;;;;''';;;'';;'''';;;;'```
                                                                ` ``````````                       ``.```..::;;;.. ``````..;:::::::;;;:;;;;;;::;;;;;;;;;;;;:,.....```......';;;;;;''';;;;;;;''';;;;;;```
                                                                ` ``````````                        `.  ``.,,;;:.. ```````.;::::::::;;:;;;;;::;;;;;;;;;;;;;,,..`.,,``......;;;;;;;'';;;;;;;;;''''';;,```
                                                                  ``````````                       `.`   `..,:;,.. ```````.,::::::::;;::;;;;:;;;;;'';;;;;;,...``.,.```...,,,';;;;''';;;;;;;;;;'';;;;.```
                                                                  ``````````                       `.   ```.,,,,.``````````.:::::::::::::;:;:;;;;';'';;;;,,..```,,`````..,,,';;;;''';;;;;;;;;;'';;;:.```
                                                                ` ``````````                       ,,` `````.,,,.``````````.;:,::,,::::;;;;:::;;;;';;;;;:,,.```,,.`````..,,,;'';;'';;;;;;;;;;;';;;;;.```
                                                                ` ``````````                     ``,.` ``````.,..``````````.::,,,,,::::::;;;::;;;;;;;;;,.,,.```,,```````.,,,,'''''''';;;;;;;'';;;;;;.```
                                                                 ```````````                      `,,````````....```````````.:,::,,,:;;;;;;;:::;;:::;;:...,.``,,`````````,,.,;''''''';;';;;';;;;;;;;,```
                                                                 ```````````                      ,,.`````````..`````````````.,::,,::;;;;;;;;;;;;::::,......`.,.``````````...;''''''';;;;;;;;;;;;;;;:```
                                                                 ````````````                    `,,. ```..```.```````````````.,:::::;;;;;;;;;;;:::'.......``.,``````.,```..,:''''''';;'';;;;;;;;;;;,```
                                                                 ` ``````````                    `,,,```,..```.````````  ``` ``..;:::;;;;;;;;;;;::;.......`````````..;:.``.,,:''';;''';;;;;;;;;;;;;;,```
                                                                   ``````````                     ,::``.,,````.````````` ```````..::;;;;;;;;;;;;::........``.`````.,;;:```..;,''';;''';'';;;';;;;;;;,```
                                                                 ````````````                     ,:,`.,.``.``````````` ```    ```..;;;;;;;;;;:;.........``..`````,';.```,,;'`;;';;''';;;;;;';;;;;;;,```
                                                                  ` `````````                     ,::`,.``,,:```````   ````   `````..,;;;;;;;:...........``...````;',```..:;;.''';;;'';;;;;;;;;;;;;;,```
                                                                  ````````````                    `::.,``.:,.````````  ``   ````````.....``.............``....````':```..,;''.;;''''''';;';;;;;;;;;;.```
                                                                 ` ```````````                    `,,..``::````````` ``` ``` `````````..................``....```:;:```..,';;.''''';;;'''';;;;;;;;;:````
                                                                   ```````````                   ``,..``.,.`````````` ``   `    ``````....```...`......``.....:::::.``...;;;.;;'''';;'''';;;;;;;;;;;````
                                                                  `````````````                  ``,.. `..``````` `` `       ` ```````..``````````....``.....`..,..```...;';;;;;;'';;;''';'';;;;;;;;````
                                                                  `````````````                  ``,.`````````.```  `  ` `   ` ```````...```````````````..........```..,.''';;;;;''';;;''''';;;;;;;:````
                                                                  `````````````                   `..`````````````   `  ``  ` ````````..```````````````..`.`....`````..,.;';;;;;'''';;;'';;;;;;;;;;:````
                                                                  `````````````                   `.`````````.````      ```````````````.```````````````..`.``.`````....,.:'';;;;'''';;;'';;;;'';;;;.````
                                                                  ``````````````                  `.```.``````````  `` ```````````````````````````````````..```````...,..,';;;;;;'';;;;;;;;;;;;;;;;.````
                                                                  ``````````````                  `,` ......`.`````     `` ```````````````````````````..``...`````....,...'';;;;;;;;;;;;;;;;;;;;;;;.````
                                                                  ```````````````                 `..`.,,,,:,,.```    ``    ``````.````````````````````````.```````...:...'';;;;;'';;;;;;;;;;;;;;;;.````
                                                                  ```````````````                 ``.``.`.:::,,```  `  `  ````````````````````````````````..````````..,:..'';;;;;;;;;;;;;;;;';';;;;.````
                                                                 `````````````````                ``.`````,:::,````` ` `` `````````````````````````````````.`````````.::..:';;;;;'';;;;;;;;;'''';;:.````
                                                                 `````````````````                 ````````:::.`````   ````````````````````````````````````.``````````,::..'';;;';'';;;;;;;;;;;;;;;.````
                                                             `   ``````````````````                `````````,.```````  ````````````````````````````````````````````````::..;';';;;';;;;;;;;;;;;;;;;.````
                                                                ```````````````````                `````````````````   ````````````````````````````````````````````````::..'''';;'';;;;;;;;;;;;;;;;.````
                                                              `   ``````````````````              ```````````````````  ` ```````````````````````````````````````````````...''''';'';;;;;;;;;;;;;;:;,````
                                                                  ````````````````````              ````````````````````````````````````````````````````````````````...``..:''';;;';;;;;;;;;;;;;:;;,````
                                                                   ``````````````````      `   `  ` `````.````````````  ` `` ``````````````````````````````````````.......,,;'';'';;;;;;;;;;;;;;;;;,.```
                                                                  ```````````````````` `       `   ```````.```````` `` ` `````````````````````````````````````````........,,:;'''';;;;;;;;;;;;;:;;;,````
                               `                                ` `  ```` `````````````     `  ``` ```````````````````````````````````````````````````````````````........,,,,:''';;;;;;;;;;;;;:;::,`.``
                                                                  ``````````````````````    ``` ` `````````````````` ``````````````````````````````````````````.,..,,,,,,::,,,,:''';;;;;;;:;;;;;;;;...``
                                                                  ``````````````````````` `` ``` `````````````````````````````````````````````````````````````,,,,,:,...,::,,,,:''';;;;;;;;;;;;;;;:,.```
                                                                 `` ```````````````````````   ```````````````````````````````````````````````````````````````,,,,,;;;,.,,,,,,,.:'';;;;;;;;;;;;;;;',.````
                                                               ` `  `` ````````````````````` ```````````````````````````````````````````````````````````````,,,,,:'';;'';'';;;''''';;;;;;;;;;;;;;;;.````
                                                           ``     `````````````````````````````````````````````````````````````````````````````````````````.:...````..,,;;;;;'''''';;;;;;;;;'';;;;::````
                                                                  ```` ```````````````````````````````````````````````````````````````````````````````````.,.``````,,,,.:;;;,:;'''';;;;;;;;;;;;;;;::.```
                                                                  ```````````````````````````````````````````````````````````````````````````````````````.,.```````,,,,,,:;;,::;''';;;;;;;;;;;;;;;:::```
                                                              `    ` ```````````````````````````````````````````````````````````````````````````````````,,.``````````..,,,;;,::;''';;;;;;;;;;;;;;;::,```
                                                              `    `  ` ```````````````````````````````````````````````````````````````````````````````...````````````...,,:,:::;'';;;;;;;;;;;;;;;::,```
                                                              `  ``  ``````````````````````````````````````````````````````````````````````````````````,.````````````.`...,,.,::;'';;;;;;;;;;;';;;;:,.``
                                                             `` `     `````````````````````````````````````````````````````````````````````````````````````````````````,:,.,..,;'';;;;;;;;;;;;;;;;;::.``
                                                              `  `` ````````````````````````````..````````````````````````````````````````````````````````````````````:::,....,;;'';;;;;;;;;;;;;;;:::.``
                                                                     ````````````````````````````..`````````````````````````````````````````````````````````````...`.::::,.,..,;;'';;;;;;;;;;;;;;;::,```
                                                            ``   ``` `````````````````````````````.,.``````````````````````````````````````````````````````........,::::,,,...,;;';;;';;;;;;;;;;;;::,```
                                                             ` `  ` ` ```````````````````````````.....```````````````````````````````````````````````````....,....,::::,......,:;;;;;;;;;;;;;;;;;;;:,```
                                                              ` ````````````````````````````````.......``````````````````````````````````````````````````...,,....,:::,.,.,..:,;;;;;;;;:;;;;;;;;;;:,,```
                                                              `````` ````````````````````````````........````````````````````````````````````````````````.........,,,,...,:::;:;;;;;;;;:;:;;;;;;;;:,,```
                                                          `    ` ` ````````````````````````````````.`......`````````````````````````````````````````````..........,,,....,,:::;;;;;;;;;;;;;;;;;;:;;,.```
                                                                 ` ````````````````````````````...`..........```````````````````````````````````````````..,.........,...,,,::;;;;;;;;;;;;;;;;;;;:;;,.```
                                                                   `  ````````````````````````..`....`.......```````````````````````````````````````````..............`..,,,:;;;;;;;;;;;;:;;;;;;::;,````
                                                          ``      ````` ```````````````````````.```..........``````````````````````````````````````````.`...``...........,,,,;;;;;;;;;;;;;;;;;;;:;;.````
                                                            ` `  ````````````````````````````````````...```..````````````````````````````````````````````.```````````````.,,,:;;;;;;;;;;;;;;;;;;;:;.````
                                                           `      ```````````````````````````````````...```..````````````````````````````````````````````````````````````.,,,:;;;;;;;;;;;;;;;;;;:;;.````
                                                          ``    `````````````````````````````````````....`...`````````````````````````````````````````````````````````````.,,::;;;;;;;;;;;;;;;;::;;.````
                                                             `   ` ```````````````````````````````.`.....`...`````````````````````````````````````````````````````````````...,:;;;;;;;;';;;;;;;;;;;.````
                                                                `````````````````````````````````````...``...`````````````````````````````````````````````````````````````....:;;;;;;;;;;;;;;;;:;;;,````
                                                               ````````````````````````````````````.`...``....````````````````````````````````````````````````````````````.....:;;;;;;';;;;;;;;:;;;,````
                                                   `           ` ````````````````````````````````````..```...`````````````````````````````````````````````````````````````.....,;;;;;';;;;;;;;;;;;,,````
                                                      `     ``  ````````````````````````````````````..````...`````````````````````````````````````````````````````````````...,,:;;;;;';;;;;;;;;;;;,,````
                                                            `  ` ``````````````````````````````````````.``...``````````````````````````````````````````````````````````````.,,,,;;;;;';;;;;;;;;;;;,.````
                                                           `` ``  ```````````````````````````````````.````...``````````````````````````````````````````````````````````````.,,,,;;;;;;'';;;;;;;;;;,.````
                                                           `     ````````````````````````````````````.````...``````````````````````````````````````````````````````````````,,,,,;;;;;;';;';;;;;;;;:.````
                                                    `  `    `   `````````````````````````````````````..```...`````````````````````````````````````````````````````````````.,,,,,;;;';;'''';;;;;;;;;,.```
                                                           ````` ``````````````````````````````````...```....`````````````````````````````````````````````````````````````,,,,,:;;;';;';';;;;;;;;;;;..``
                                                       `   ``  ````````````````````````````````````....```...````````````````````````````````````````````````````````.....,,:,,:;;;;;;;'';;;;;;;;;;;,..`
                                                `      `` ` ```````````````````````````````````````....```...``````````````````````````````````....``````````````````.....,,:,::;;;;;;;';;;;;;;;;;;::..`
                                                 `     `  ``` `` ``  ``````````````````````````````....```...````````````````````````.`````````.....`````````````````.....,,:,;:;;;;;;;;;;;;;;;;;;;::..`
                                                `  ``  `` ``````````````````````````````````````````...``....``````````````````````````.```````.....`````````````````....,,;;:;:;;;;;;;';;;;;;;;;;;;:;.`
                                                     `    ``````````````````````````````````````````...``....````````````````````````````.`````....``````````````````....,,;;;::;;;;;;;';;;;;;;;;;;;;;.`
                                                     ``    ``` ` ````````````````````````````````````````....`````````````````````````````````.```.``````````````````....,:;;:::;;;;;;;';;;;;;;;;;::;;.`
                                                      ` ````` ````````````````````````````````````````````...````````````````````````````````..`.````````````````````....,;;::::;;;;;;;;;;;;;;;;;;;:;;.`
                                            ``      ````` ```` ``````````````````````````````````````..``...,`````````````````````````````````...`````````````````````..::;;:.:;;;;;''';;;;;;;;;;;;;:;.`
                                             ` `   `` ```` `````````````````````````````````````````.```.....`````````````````````````````````.....`````````````````....:;;;;.;;;;;;;'';;;';;;;;;;;;::.`
                                          ` ````    ``` ````````````````````````````````````````````````.....`.`````````````````````````````````.........```````````....:;;;;:;;;';;;';'';;;;;;;;;;;::.`
                                   `     `   `     ` ```````````````````````````````````````````````.`.......`````````````````````````````.``````.......,,::...........::;';;;;;;';;''';';;;;;;;;:::::.`
                                            `  `  `   ``````````````````````````````````````````````.`.`.....`````````````````````````.```````````.......:::,,,,,,;;;;;::;';';;;;';;''';;;;;;;;;;;:::;..
                                          `  ` `    `````` ````````````````````````````````````````.```........````````````````````````.....```````.....,,::,,,;;;;;;;';;;';';;';;'';;;;;;;;;;;;:::::;.`
                                          ```` ```   ```````````````````````````````````````````````..........```````````````````````````````````````...,,,,,,:;;;;;;;;;;;;''';';;;;';'';;;;;;;;;::::;.`
                                                 ``  ```````````````````````````````````````````````...........````````````````````````````````````````.,,,,,,,;;;;;;;;;;;;;'';;;;';;;'';;;;;;;;;:::;:..
                                      `    ` ``  ````````````````````````````````````````````````````..........`````.```````````````````````````````````..,,,..:;;;;;;;;;;;;'';;''''';;';;;;;;;;;::;;,..
                                   `       ````  ````````````````````````````````````````````````````...........``.`````````````````````````````````````...,....;;;;;;;;;;;;;'''''';;';;;;;;;;;;;::;;,..
                                      `   `` ```` ` `````````````````````````````````````````````````....````....``.````````````````````````````````````.......:;;;;;;;;;;;;';';;';;';;;;;;;;;;;:::;:,..
                            `         `  `` ````` ``````````````````````````````````````````````````.....``````......````````````````````````````````````..`...;';;;;;;;'''';;;;;;;;;;';;;;;;;;;:::;,,..
                                        ```   `````````````````````````````````````````````````````......```````......``````````````.``,,````````````````````::;;;;;'';;;;;;;;';;;;;;;';;;;;;;;;::;:,,.`
                                        `````` ```````` ```````````````````````````````````````````.......```````......``.```.`.`.``.,...,.`...`.`````````:,.:;;;;;'';;;;;;;'''';;;;;;;';;;;;;;;::;,,...
                                            ``` ``````````````````````````````````````````````````......`..````````...```..```````.,,,,,,,.......,```````,,:::;;;;;'';;;;;';;;;;;;;;;';;;;;;;;;::;:,,..`
                                      `` ` ````   ``` ````````````````````````````````````````````,.........````````...``..```....,,,,,,,,,,,,,,,,.``````::,::;;;;;';;;;;;;;;;';;;;;;'';;;;;;;;::;,,,...
                                   `  `     `````````````````````````````````````````````````````............`````````.```.......,,,,,,,,,,,,,,,,,,`````,:,,:::;;;;;;;;;;;;;';;;;;;;;';';;;;;;;:;:,,,...
                                       `  `` ``` `` `````````````````````````````````````````````..............````````.``.`....,,,,,:::,:,,:::::,,,```.,,,,,:;;;:;'';;;;;;;';;'';';';;;;;;;;;;:;',,,.``
                                     `    ``  ` `` ` ```````````````````````````````````````````..............`.````````..``...,,,,:::::,::::::::::,```.,,,,,::::;;'';;;;';'';;;;;;';;;;;;;;;:;::',,,```
                                            `  ` `````` ````````````````````````````````````````.................`````````.....,,::::::::::;;;;;;::::::::::,,::;;;;';;;;;;'''';;;;;';;;;;;;;;:::;:,,.```
                                          `    `````````` `````````````````````````````````````.............`.`.````````````..,,,:::::::;;;;;;;;;;;:;;::::,:::::;;;'';;;;;;;;';;';;'';;;;;;;;;:;;:,,.```
                                           `   ````` ````` ```````````````````````````````````...............````````````````.,,::::::;;;;;;;;;;:;:;;;::::::::;;;;;';;;;;;'';'';;';;;;;;;;;;;;:;;:,,````
                                         ` ` ` ````` `````````````````````````````````````````...............`````...````````.,:::::;;;;;;;;;;;;;;;;'';;:::::::;;;'';;;;;;;''';;;;;;';';;;;;;;;;;,,,````
                                    `   ``   ````````````````````````````````````````````````.....,,,........`.``.....```..,,:;;;;;;;;;;;;;;;;;;;;;;'';;:::::::;;;''';;;;;;'';;;;;;;;;;;;;;;::::;,,.````
                                       ```   `````` ```````````````````````````````````````:::::::::,,,,......``........,:,::::;;;;;;;;;;;;;;;;;:;;;''';::::::;::;;';;;;;;;'';;;;;;;;';;;;;:::;:;,,.````
                                     `   ``  `` ` ` ``````````````````````````````````````.::::::;::::;::......`......::;:,::::::;;;;;;;;;;;;;;;;;;''';;;:;:;::::;;';;;;;;;;;;;;;;;;;';;;;;;::::;,,,````
                           `          `` ``  ````````````````````````````````````````````...,::;:;;:::::;;:........,;::;;;;:::::::;;;;;;;;;;;;:;;;;'';;;;:::;;:::;;';;;;;;;';;;;';;';;;;;;;;::::;:,.````
                                          `   ```````` `````````````````````````````````.....,::;;;::::::::;.....,::;;::;;;;:::::::;;;;;;;;;;;;;;;;'''';;;::;:::;;'';;;;;;;;;;;;;'';;;;;;;:;:::;;,,.````
                                        ````  ````````````````````````````````````````````...,,,::;:;::::;:;:.,,,::::;;:;;;;:::::::;;';;;;;;;;;;;;''''';;;::::::;;'';;;;;;;;;;;;;';;;;;;;;;;:;:;;,,.````
                                      ` ``   ` ````` ``````````````````````````````````.``....,,,,::;::::::;;,,:::;:;;:;;;;;'::::;:;;;;;;;;;;;;:;'''''';;::::::::;;;;;;;;;;;;;;;;;;;;;;:;;;:::;;;,.`````
                                          `     `   ``` ``````````````````````````````.```....,,,,,:;::::::;;;;:;;;::;;::;;;;;::::::::::;;;;;;;;;'''''';;;::::;::;;;;;;;;;;;;;;;;;;;;;;;;;::::;;;,.`````
                                          `    ` ``````````````````````````````````````.````...,,,,,:::::::;;;;:;;;::;:::;;;;':::::::::::;;;;;;;;'';''';;::::::,;;;;;;;;;;;;;;;;;;;;;;;;;;::;;:;:,.`````
                                     `  ``  ` ` `````````````````````````````````````.`````.,...,,,,,::;::;;;;;;;;::::::;;;;;''::::::::::::';;;;;;';'''';;::::,,;;;;;;;;;';;;;;;;;;;;;;;;::;;:;;,,.`````
                                                  `` `  ` ``````````````````````````.`.``........,,,::::::::;;;;;:::::::;;;;;'';::::::::::::;;;;;;'';''';;:::;,,,;;;;;;;;;;;;;;;;;;;;;;;;:::;:;:,,.`````
                                                  `` ```````````````````````````````.`````,....,,::::::::::::;;:::::::::;;;;;';;;:::::::::::::;;;;''';;';;:::;,,,;:;;;;;;;;;;;;;;;;;:;;;:::;;;;,,,.`````
                                            `  `  `````````````````````````````````````..,,,,::::::::::::::::;::::;:::::::;;;;';'::::::::::::;:;;;;;;';;;;:;;,...;;;;;;;;;;;;;;;;;;;;;;;::;:;,,,,,,`````
                                              ` `` ``````````````````.....,,,,,,,,..,,,,,,,:,:::::::::::::::::::;;;:::::::;;;;''';::::::::::::::;;;';'';;;;::,,..:;;;;;;;;;;;;;;;;;;;:;;;;;;,,,,,.....``
                                             ````````````````````````...,,,,,,,,:,,,,,,,,:,:::::::::::::::::::;:;;;;;:::::::;;;'''::::::::::::,:::;'''';;;;::.,..,;;;;;;;;;;;;';;;;;;;;:;;;:,,,,,......`
                                          `  ```` `````````````````````....,,,,,,,,,::,,::::,::::::::::::::::;:;;;;;;:;:::::;;:;'';::::::::::,,:,,,;;';;;;;:,,...,;;;;;;;;;;;''';;';;;;::;;,,,,,,......`
                                      `   `   `` ```````````````````````....,,,,,,,::::,,::::,:::::::::::::::::;:;;:;;:::::::;:;'''::::::::::::,,,,,,;;;;:::,,,...;;;;;;;;;;;';;;;;;;;:;:;;;,,,,.......`
                                           ``` `  ```````````````````````````...,,,,::,,:,:::::::::::::::::::::;;:::;;;:::::::::;;;':::::::::::,,,,,,,::::::,,,...;;;;:;;;;;;;;;;;;;;;;;:;;;,,,,..```.``
                                          ``  ``` `````````````````````````````...,,::,::,:::::::::::::::::::::;:::;;;::;;;::::::;;';::::::::::,,,,,,,,,::::,,,...:;;;;;;;;;;;;;;;;;;;;;;;:;:,,..``````.
                                                 ````````````````````````````````....,:::,,::,:::::::::::::::::;:::;;:::;;;:::::::;;;;:::::::::,:,,,,,,,,,..:,..,.,;;;;;;;;;;;;;;;;;;;;:;::::,.`````````
                                              `  ``````````````````````````````````.....,,::,,,::::::::::::::::;;;;;;:,:;;;::::::::;';::::::::::,,,,,,,,,..;:::....;;;;;;;;;;;;;;;;;;;;;;;;::..`````````
                                               ``````````````````````````````````````,...,,,,,,::::::::::::::::::;;;;;:,::::::::::::';',,,,,,:::,,,,,,.,..:';:::...;;;;;;;;;;;'';;;;;;;;;;;::.``````````
                                           ``````````````````````````````````````````.`.,.,:,:,::;::::::::::;;::;;;;;;:::,::::::::::;;;:,,,,::,:,,,,,,,,,,;;;::::..;;;;;;;;;;;;;;';;;;;;;;:;,.``````````
                                             ``` ` ```````````````````````````````````````,,,,,::::::::::::::;:::;;;;;;::,,,::::::::;;;;,,,,::::,,,,,,,..,:;;:;::,.;;;;;;;;;;;;;;;;;;;;;;;;;;;``````````
                                            ``` ``  ```````````````````````````````````````,,,::::::::::::;;::::::;;'';:,,,,,::::::::;;;:,,,:::,,,,,,,...,;;;:;:::,:;;;;;;;;;;;;;;;;;;;;;;;;:;``````````
                                           ``       ````````````````````````````````````````,,:::::::::::::::::::::;';;;,,,,,::::::::;;;;,,,,::,,,,,,,....:;;::;;::,;;;;;;;;;;;;;;;;;;;;;;;;::.`````````
                                           ``  ``````````````````````````````````````````````,,:::::::::::::::::::,:;;;;;,,,,:::::::::;;;:,,,,,,,,,,,,,,..:;;;:;:::.:;;;;;;;;;;;;;;;';;;;;;;;:;`````````
                                          `    ```````````````````````````````````````````````.,::::::::::::::::,,:,;;;;;:,,,::::::::::;;;,.,,,,,,,,,,,,..:;;:::;;;,:;;;;;;;;;;;;';;;;;;;;;;;;:`````````
                                         `     ````````````````````````````````````````````````.,:::::::::::::::,,,:,;;;;;,,,::::::::::;;;:,..,,,,,,,,,,.,:;::::;;;;::;;;;;;;;;;';;;;;;;;;;;';:.````````
                                        `     ``````````````````````````````````````````````````.,::::::::::::::,,,,,:;;;;;:,::,::::::::;;;,..,,,,,,,.,.,.;;:;;:;;;;::::;;;;;;;;;';;;;;';;;;;;:.````````
                                       `   ` `````````````````````````````````````````````````````,:::::::,:::,,,,,,,,;;;'',::,,::::::::;;;;..,,,,,,...,..;;;;:::;;;::::;;::;;;:;'';;;'';;;;:;;`````````
                                      `      `````````````````````````````````````````````````````.,::::::::::,,,,,,,,,;'''':,,,:::::::::;;;:....,,,,,....:;::::::;;::::;;::;;;.:;;;';';;;;:..``````````
                                           ```````.......``````````````````````````````````````````,,;:::::::,,,,,,,,,,:'''';,,,,:::::::::;;;,........,...;;;:::::;;:::::;;:;;;..;''''';':;....`````````
                                             ``..........,,,,.``````````````````````````````````````::::::::,,,,,,,,,,,,''''',,,,,::::,:,,;;;:........,..,;;;::::::;;:::::;;;;:..;;''''';;.....`````````
                                            ``............,,,,,,,,..`````````````````````````````````:::::::,,,,,.,,,,,,:''''':,,,,:::,,:,:;;:,...........;;;;;:::;::;:;::;;:;:..;;''''';;.....`````````
                                           `````````````..,.,.,,,,,:,,,.,,,,,,:,,,.`````````````````..,::::,,,,,,,,,,,,,,';;;;',,,,:::::,,:;;;:...........;;;;;;;::;::;:::;;:;...,'''''';,.....`````````
  `.         .                            ..`  ``````````````.,,,,,::;:;::::,::::::::::,````````````..,:::::,,,,,,,,,,,,,:;'';'',,,:::::,::,;;:,........,.;;;;;;::::;:::::;;;:....;''''';....```````````
 . .        .  .`                        ` `   `````````````````..,::,::::::;::;;;;::::::,.```````````.:::::,.,,,,,.,,...,';''''',::::::::,,:;;:..........;;;:;;::;:::::::;;;:::,.:'''';.....```````````
           ` `. .   `                   `          ````````````````````,::::;:;;;;:;:;:;::,:.````````..::::::,,,,,,,,,...,,;'''';,,:,:::::,::;::,..`......;;;;;;:::::::::;;;;::::,.'''';....````````````
 ``        ` .                                    ```````````````````````.:;;;:;;;;;;;;;:::::,```````...:::::,,,,,,,,....,:;'''''',:::::,,,,:;;;:.........;;;;;;:::;;:;;;;;;;:::::.,'';.....````````````
 ,  `     .  ` ``, ,                             ```````````````````````````:,::;;;;;;;;:;::::;``````...::::::.,,,,.....,,,,'''+'';:::::,,,,,:;;:,........;;;;;;:::;::;;;;;;;;::::``.;..`...````````````
   . `    . ,  . ````.``      `               ````````````````````````````````.,::::::;;:;;:;:;;,`````..,::::,,..,......,..,'''+'''::::,,,,,::;;::...`.`..;;;;;;:;;;;;;;;;;;;;:::,`````...``````````````
 .. ` .            ,   ``.,,.`              `` ``````````````````````````````,````.,:::::;;;:;';;.````...:;;:,,.........,...,'''+'',,,,,,,,,,,,;::...```..;;;;;;::;;;;;;;:;;;;;:::``````````````````````
                                                `````````````````````````````,,,```````.:;:;;;';;:````...:;;:::,............,,'++'',,,,,,,,,,,,;:::.`````.:;;;::;::::::;;;;;;;;:::``````````````````````
                                                   ````    ` ````````````````.,,,,.````````,:;;;;;.```....;;:::,.....,........:''''..,,,,,,,,,,,:::.``````:;:::::::::::;;;;;;;;::```````````````````````
                                                           ``` ``````````````.,.,,,,,::,.````.::;::```....:;;::,...,...........:'',...,...,..,..::::``````:;::::::::;;::;;;;;;;:````````````````````````
</pre>
	
	<P id="font2" onmouseover="showTopBanner()" onmouseout="hideTopBanner()">SHARE SECRET</P>
	
	<banner1 id="banner_trans1" onmouseover="showTopBanner()" onmouseout="hideTopBanner()"></banner1>
	<script>
		function showTopBanner(){
			document.getElementById("banner_trans1").style.height='130px';
			document.getElementById("font3").style.opacity='1';
			document.getElementById("font3a").style.opacity='1';
			document.getElementById("font4").style.opacity='1';
			
		}
		function hideTopBanner(){
			document.getElementById("banner_trans1").style.height='0px';
			document.getElementById("font3").style.opacity='0';
			document.getElementById("font3a").style.opacity='0';
			document.getElementById("font4").style.opacity='0';
		}
	</script>
	
	<?php
		if($_SESSION['email']!=null){ 
			echo '<a href="sharesecret_logout.php"><P id="font4" onmouseover="showTopBanner()" onmouseout="hideTopBanner()">Log Out</P></a>';
		}else{
			echo '<a href="sharesecret_login.php"><P id="font4" onmouseover="showTopBanner()" onmouseout="hideTopBanner()">&nbspLog In</P></a>';
		}
	?>
	<P id="font3a" onmouseover="showTopBanner()" onmouseout="hideTopBanner()">|</P>
	<a href="sharesecret_contact.php"><P id="font3" onmouseover="showTopBanner()" onmouseout="hideTopBanner()">Contact Us</P></a>
	
	
	
	<P id="font1" onmouseover="showTopBanner()" onmouseout="hideTopBanner()">Your secret is safe with us.</P>

	<p id="openfold1" class="file"></p>
	<p id="fold1" data-sid="" class="folder" onclick="openF(this.id,1)"></p>
	<wordfont12 id='foldr1' style="position:absolute; left:58%; top:33%;"></wordfont12>
	<wordfont12 id='foldt1' style="position:absolute; left:57.5%; top:34.8%;"></wordfont12>
	<p id="openfold2" class="file"></p>
	<p id="fold2" data-sid="" class="folder" onclick="openF(this.id,2)"></p>
	<wordfont12 id='foldr2' style="position:absolute; left:58%; top:60%;"></wordfont12>
	<wordfont12 id='foldt2' style="position:absolute; left:57.5%; top:61.8%;"></wordfont12>
	<p id="openfold3" class="file"></p>
	<p id="fold3" data-sid="" class="folder" onclick="openF(this.id,3)"></p>
	<wordfont12 id='foldr3' style="position:absolute; left:58%; top:87%;"></wordfont12>
	<wordfont12 id='foldt3' style="position:absolute; left:57.5%; top:88.8%;"></wordfont12>
	
	<p id="openfold4" class="file"></p>
	<p id="fold4" data-sid="" class="folder" onclick="openF(this.id,4)"></p>
	<wordfont12 id='foldr4' style="position:absolute; left:70%; top:33%;"></wordfont12>
	<wordfont12 id='foldt4' style="position:absolute; left:69.5%; top:34.8%;"></wordfont12>
	<p id="openfold5" class="file"></p>
	<p id="fold5" data-sid="" class="folder" onclick="openF(this.id,5)"></p>
	<wordfont12 id='foldr5' style="position:absolute; left:70%; top:60%;"></wordfont12>
	<wordfont12 id='foldt5' style="position:absolute; left:69.5%; top:61.8%;"></wordfont12>
	<p id="openfold6" class="file"></p>
	<p id="fold6" data-sid="" class="folder" onclick="openF(this.id,6)"></p>
	<wordfont12 id='foldr6' style="position:absolute; left:70%; top:87%;"></wordfont12>
	<wordfont12 id='foldt6' style="position:absolute; left:69.5%; top:88.8%;"></wordfont12>
	
	<p id="openfold7" class="file"></p>
	<p id="fold7" data-sid="" class="folder" onclick="openF(this.id,7)"></p>
	<wordfont12 id='foldr7' style="position:absolute; left:82%; top:33%;"></wordfont12>
	<wordfont12 id='foldt7' style="position:absolute; left:81.5%; top:34.8%;"></wordfont12>
	<p id="openfold8" class="file"></p>
	<p id="fold8" data-sid="" class="folder" onclick="openF(this.id,8)"></p>
	<wordfont12 id='foldr8' style="position:absolute; left:82%; top:60%;"></wordfont12>
	<wordfont12 id='foldt8' style="position:absolute; left:81.5%; top:61.8%;"></wordfont12>
	<p id="openfold9" class="file"></p>
	<p id="fold9" data-sid="" class="folder" onclick="openF(this.id,9)"></p>
	<wordfont12 id='foldr9' style="position:absolute; left:82%; top:87%;"></wordfont12>
	<wordfont12 id='foldt9' style="position:absolute; left:81.5%; top:88.8%;"></wordfont12>
	
	<div style="position:absolute;left:90%; top:16%;" class="loopback" onClick="refreshSecrets()"></div>
	
	
	
	<?php
		
		/*
		$sql = 'SELECT * from data';
		$result = mysql_query($sql);
	
		while($row = mysql_fetch_array($result)){
			if($row['stopTime']<time()){
				$id = $row['id'];
				$sql = "UPDATE users SET id='' WHERE id='".$id."'";
				//$sql = "DELETE FROM data WHERE id='$id'";
				mysql_query($sql);
			}
			if($row['readCount'] >= $row['count']){
				$id = $row['id'];
				$sql = "UPDATE users SET id='' WHERE id='".$id."'";
				mysql_query($sql);
			}
		}
		*/
		//if($row['stopTime']>time() && $row['readCount']<$row['count'])
		$sql = 'SELECT id FROM data ORDER BY RAND()';
		$result = mysql_query($sql);
	
		$scount=1;
		while($sid = mysql_fetch_array($result)){
			if($sid['stopTime']>time() && $sid['readCount']<$sid['count']){
			getMsgs($sid['id'],$scount);
			$scount++;
			if($scount>9) break;
			}
		}
	
		function getMsgs($sid1,$scount1){
			$read = 0;
			$ID = $_COOKIE["id_".$sid1.""];
			if($ID!=null) $read = 1;
		
			if($read==0){
				echo '<script language="javascript">';
				echo 'document.getElementById("fold'.$scount1.'").dataset.sid="'.$sid1.'";';
				//echo 'alert("'.$sid1.'");';
				echo '</script>';
			}
		
		}
	?>
	
	
	
	<script>
		
		catchPHP();
		
		function checkTimeRead(){
			//alert("TEST");
			
			for(k=1; k<=9; k++){
				var id3 = "fold"+k;
				$.post(
        			"ajax_get_secret_readsleft2.php",
        			"sid="+document.getElementById(id3).dataset.sid+"&k="+k,
        			function(responseStr){
            			//alert(responseStr);
            			var res2 = responseStr.split(" ");
            			var id4 = "foldr"+res2[0];
            			var id5 = "foldt"+res2[0];
            			var tsec = parseInt(res2[1]%60);
            			var tmin = parseInt(res2[1]/60%60);
            			var thour = parseInt(res2[1]/3600);
            			//alert(id4);
            			document.getElementById(id4).innerHTML = res2[2] +" read(s) left.";
            			if(res2[1]>0) document.getElementById(id5).innerHTML = thour + " Hs " + tmin + " Ms " + tsec + " Ss";
            			else document.getElementById(id5).innerHTML = "&nbsp&nbspNOT AVAILABLE";
            			//error message at responseStr
            			//alert(responseStr);
            			//document.getElementById(id4).innerHTML=responseStr+" read(s) left.";
            			//alert(id4);
            			//if(responseStr==1) document.getElementById("display_textarea_readcount").innerHTML="1 person has read this secret.";
            			//else document.getElementById("display_textarea_readcount").innerHTML=responseStr+" people have read this secret.";
        			}
    			);
			}
			
			setTimeout(function(){checkTimeRead()}, 1000);
			
			
		}
		
		setTimeout(function(){checkTimeRead()}, 100);
		
		function openF(id,X){
			document.getElementById(id).style['-webkit-transition-duration']="0.5s";
			document.getElementById(id).style['-moz-transition-duration']="0.5s";
			document.getElementById(id).style['-ms-transition-duration']="0.5s";
			document.getElementById(id).style['-o-transition-duration']="0.5s";
			document.getElementById(id).style['transition-duration']="0.5s";
			
			document.getElementById(id).style['-webkit-transform']="rotateX(360deg) scale(0,0)";
			document.getElementById(id).style['-moz-transform']="rotateX(360deg) scale(0,0)";
			document.getElementById(id).style['-ms-transform']="rotateX(360deg) scale(0,0)";
			document.getElementById(id).style['-o-transform']="rotateX(360deg) scale(0,0)";
			document.getElementById(id).style['transform']="rotateX(360deg) scale(0,0)";
			
			document.getElementById("open"+id).style['-webkit-transform']="scale(3.5,3.5)";
			document.getElementById("open"+id).style['-moz-transform']="scale(3.5,3.5)";
			document.getElementById("open"+id).style['-ms-transform']="scale(3.5,3.5)";
			document.getElementById("open"+id).style['-o-transform']="scale(3.5,3.5)";
			document.getElementById("open"+id).style['transform']="scale(3.5,3.5)";
			document.getElementById("open"+id).style.opacity="0.6";
			
			document.getElementById("foldr"+X).style.opacity="0";
			document.getElementById("foldt"+X).style.opacity="0";
			
			document.getElementById("display_textarea_time").style.top="105px";
			document.getElementById("display_textarea_readcount").style.top="640px";
			document.getElementById("display_textarea").style.top="130px";
			document.getElementById("display_window").style.opacity="0.5";
			document.getElementById("display_window").style.zIndex="3";
			//alert("open "+title);
			//document.getElementById("display_textarea").value="YEAH";
			//alert(document.getElementById(id).dataset.sid);
			
			$.post(
        		"ajax_get_secret_timeleft.php",
        		"sid="+document.getElementById(id).dataset.sid,
        		function(responseStr){
            		//error message at responseStr
            		//alert("TIME LEFT: "+responseStr);
            		if(responseStr>0){
            			$.post(
        					"ajax_get_secret_readsleft.php",
        					"sid="+document.getElementById(id).dataset.sid,
        					function(responseStr){
            					//error message at responseStr
            					//alert("READS LEFT: "+responseStr);
            						if(responseStr>0){
            		//no problem
            		$.post(
        		"ajax_get_secret_content.php",
        		"sid="+document.getElementById(id).dataset.sid,
        		function(responseStr){
            		//error message at responseStr
            		//alert(responseStr);
            		document.getElementById("display_textarea").value=responseStr;
        		}
    		);
			//get message time
			$.post(
        		"ajax_get_secret_time.php",
        		"sid="+document.getElementById(id).dataset.sid,
        		function(responseStr){
            		//error message at responseStr
            		//alert(responseStr);
            		document.getElementById("display_textarea_time").innerHTML=responseStr;
        		}
    		);
    		//get message read count
    		$.post(
        		"ajax_get_secret_readcount.php",
        		"sid="+document.getElementById(id).dataset.sid,
        		function(responseStr){
            		//error message at responseStr
            		//alert(responseStr);
            		if(responseStr==1) document.getElementById("display_textarea_readcount").innerHTML="1 person has read this secret.";
            		else document.getElementById("display_textarea_readcount").innerHTML=responseStr+" people have read this secret.";
        		}
    		);
            		
            		
            						}else{
            							document.getElementById("display_textarea_time").innerHTML='';
    			document.getElementById("display_textarea_readcount").innerHTML='';
    			document.getElementById("display_textarea").value='Sorry, the secret you are looking for is no longer available.';
    		
            						}
        						}
    					);
            		}else{
            			document.getElementById("display_textarea_time").innerHTML='';
    			document.getElementById("display_textarea_readcount").innerHTML='';
    			document.getElementById("display_textarea").value='Sorry, the secret you are looking for is no longer available.';
    		
            		}
        		}
    		);
			
			clickDisabled3=true;
			setTimeout(function(){clickDisabled3 = false;}, 2000);
		}
		
		var clickDisabled2=false;
		
		function refreshSecrets(){
			if(clickDisabled2) return;
			for(i=1; i<=9; i++){
				id = "fold" + i;
				document.getElementById(id).style['-webkit-transition-duration']="0.1s";
				document.getElementById(id).style['-moz-transition-duration']="0.1s";
				document.getElementById(id).style['-ms-transition-duration']="0.1s";
				document.getElementById(id).style['-o-transition-duration']="0.1s";
				document.getElementById(id).style['transition-duration']="0.1s";

				document.getElementById(id).style['-webkit-transform']="rotateX(360deg) scale(1,1)";
				document.getElementById(id).style['-moz-transform']="rotateX(360deg) scale(1,1)";
				document.getElementById(id).style['-ms-transform']="rotateX(360deg) scale(1,1)";
				document.getElementById(id).style['-o-transform']="rotateX(360deg) scale(1,1)";
				document.getElementById(id).style['transform']="rotateX(360deg) scale(1,1)";
				
				document.getElementById("foldr"+i).style.opacity="1";
				document.getElementById("foldt"+i).style.opacity="1";
			}
			setTimeout(function(){
			for(i=1; i<=9; i++){
				id = "fold" + i;
				document.getElementById(id).style['-webkit-transition-duration']="0.5s";
				document.getElementById(id).style['-moz-transition-duration']="0.5s";
				document.getElementById(id).style['-ms-transition-duration']="0.5s";
				document.getElementById(id).style['-o-transition-duration']="0.5s";
				document.getElementById(id).style['transition-duration']="0.5s";

				document.getElementById(id).style['-webkit-transform']="rotateX(0deg) scale(1,1)";
				document.getElementById(id).style['-moz-transform']="rotateX(0deg) scale(1,1)";
				document.getElementById(id).style['-ms-transform']="rotateX(0deg) scale(1,1)";
				document.getElementById(id).style['-o-transform']="rotateX(0deg) scale(1,1)";
				document.getElementById(id).style['transform']="rotateX(0deg) scale(1,1)";
				
				document.getElementById("open"+id).style['-webkit-transform']="scale(1,1)";
				document.getElementById("open"+id).style['-moz-transform']="scale(1,1)";
				document.getElementById("open"+id).style['-ms-transform']="scale(1,1)";
				document.getElementById("open"+id).style['-o-transform']="scale(1,1)";
				document.getElementById("open"+id).style['transform']="scale(1,1)";
				document.getElementById("open"+id).style.opacity="0";
			}
			}, 100);
			document.getElementById("display_textarea").value='';
			catchPHP();
			clickDisabled2 = true;
      		setTimeout(function(){clickDisabled2 = false;}, 3000);
		}
		
		
		function catchPHP(){
			
			$.post(
        		"ajax_get_secrets.php",
        		{},
        		function(responseStr){
            		//alert(responseStr);
					var res = responseStr.split(" ");
					//alert(res);
					for(t=0; t<9; t++){
						y=t+1;
						document.getElementById("fold"+y).dataset.sid=res[t];
					}
        		}
    		);
			
			/*
			<?php
			$sql2 = 'SELECT id FROM data ORDER BY RAND() ';
			$result = mysql_query($sql2);
	
			$scount=1;
			while($sid = mysql_fetch_array($result)){
				getMsgs2($sid['id'],$scount);
				$scount++;
				if($scount>9) break;
			}
	
			function getMsgs2($sid2,$scount2){
				$read = 0;
				$ID = $_COOKIE["id_".$sid2.""];
				if($ID!=null) $read = 1;
		
				if($read==0){
					echo 'document.getElementById("fold'.$scount2.'").dataset.sid="'.$sid2.'";';
					echo 'alert("'.$sid2.','.$scount2.'");';
				}
			}
			?>
			*/
		}
	</script>
	
	<p id="temp"></p>
	
	<p id="font6">
	Hello stranger.<br>
	They don't know who you are.<br>
	And you don't know who they are.<br>
	<br>
	For those who know too much.<br>
	You don't need to worry about anything here.<br>
	Let everything out of your mind.<br>
	All your darkest secrets.<br>
	All your deepest regrets.<br>
	No one will ever know.<br>
	<br>
	And for those who want to know.<br>
	Go on.<br>
	Brace yourself for a journey.<br>
	A journey in which you get to feed yourself.<br>
	From the hunger of curiosity.<br>
	<br>
	You can read other people's secrets on the right.<br>
	你可以在右邊讀到別人的秘密。<br>
	<br>
	Tap the refresh button to see more secrets.<br>
	點更新按鈕會讓得到更多的秘密。<br>
	<br>
	Or you can share your own secrets on the left.<br>
	你也可以在左邊分享你自己的秘密。<br>
	<br>
	You can save up your secrets by logging in.<br>
	登錄後可以把自己的秘密儲存起來。<br>
	<br><br>
	Be ready, for a world without IDENTITY.<br>
	</p>
	
	
	
	<banner5 id="banner_trans5" onmouseover="showLeftBanner2()" onmouseout="hideLeftBanner2()"></banner5>
	<banner4 id="banner_trans4" onmouseover="showLeftBanner2()" onmouseout="hideLeftBanner2()"></banner4>
	<script>
		function showLeftBanner2(){
			document.getElementById("banner_trans4").style.left='630px';
			document.getElementById("banner_trans5").style.width='645px';
			document.getElementById("recall_icon").style.left='652px';
			document.getElementById("font8").style.left='652px';
			if(document.getElementById("left2div")!=null) document.getElementById("left2div").style.left='40px';
			document.getElementById("banner_trans2").style.opacity='0.2';
			document.getElementById("banner_trans3").style.opacity='0.2';
			document.getElementById("font15").style.left='50px';
		}
		function hideLeftBanner2(){
			document.getElementById("banner_trans4").style.left='-5px';
			document.getElementById("banner_trans5").style.width='0px';
			document.getElementById("recall_icon").style.left='18px';
			document.getElementById("font8").style.left='18px';
			if(document.getElementById("left2div")!=null) document.getElementById("left2div").style.left='-590px';
			document.getElementById("banner_trans2").style.opacity='1';
			document.getElementById("banner_trans3").style.opacity='1';
			document.getElementById("font15").style.left='-580px';
		}
	</script>
	<p id="recall_icon" class="recall" style="position:absolute;left:18px;bottom:260px;" onmouseover="showLeftBanner2()" onmouseout="hideLeftBanner2()"></p>
	<center id="font8" onmouseover="showLeftBanner2()" onmouseout="hideLeftBanner2()">R<br>e<br>c<br>a<br>l<br>l<br>.</center>
	
	
	<?php
		if($_SESSION['email']!=null){
			echo '<p id="font15" style="position:absolute;top:10px;left:-580px" onmouseover="showLeftBanner2()" onmouseout="hideLeftBanner2()">These are your secrets.</p>';
			$sql = "SELECT * FROM data where account = '".$_SESSION['email']."' ORDER BY id ASC";
        	$result = mysql_query($sql);
        	$count = mysql_num_rows($result);
        	if($count>0) echo '<div id="left2div" class="divanimation" style="position:absolute;top:50px;left:-590px;width:560px;height:90%;line-height:3em;overflow:auto;padding:5px;overflow-x:hidden;" onmouseover="showLeftBanner2()" onmouseout="hideLeftBanner2()">';
        	while($row = mysql_fetch_array($result)){
			//<textarea readonly class="notes3">I AHAHSDHASHDAHSHASDAHSDHASDHASH</textarea><br><br>
			echo '<textarea readonly class="notes3">Posted on '.$row['startTime'].'&#13;&#10;'.$row['readCount'].' people has read this secret.&#13;&#10;&#13;&#10;'.$row['content'].'</textarea><br><br>';
			}
			if($count>0) echo '</div>';
			else echo ""; //nosecret
		}else{
			echo '<p id="font15" style="position:absolute;top:10px;left:-580px" onmouseover="showLeftBanner2()" onmouseout="hideLeftBanner2()">These are your secrets. You have to <a href="sharesecret_login.php">log in</a> to see them.</p>';
		}
	?>
	
	
	<banner3 id="banner_trans3" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()"></banner3>
	<banner2 id="banner_trans2" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()"></banner2>
	<script>
		var shared=0;
		var clickDisabled=false;
		function showLeftBanner1(){
			document.getElementById("banner_trans2").style.left='630px';
			document.getElementById("banner_trans3").style.width='645px';
			document.getElementById("compose_icon").style.left='650px';
			document.getElementById("font7").style.left='652px';
			document.getElementById("font9").style.left='35px';
			document.getElementById("font10").style.left='35px';
			document.getElementById("font12").style.left='200px';
			document.getElementById("note_area").style.left='35px';
			document.getElementById("counter").style.left='35px';
			document.getElementById("count").style.left='37px';
			document.getElementById("timer").style.left='316px';
			document.getElementById("time").style.left='318px';
			document.getElementById("font11").style.left='35px';
			document.getElementById("share_button").style.left='390px';
		}
		function hideLeftBanner1(){
			document.getElementById("banner_trans2").style.left='-5px';
			document.getElementById("banner_trans3").style.width='0px';
			document.getElementById("compose_icon").style.left='16px';
			document.getElementById("font7").style.left='18px';
			document.getElementById("font9").style.left='-595px';
			document.getElementById("font10").style.left='-595px';
			document.getElementById("font12").style.left='-435px';
			document.getElementById("note_area").style.left='-600px';
			document.getElementById("counter").style.left='-595px';
			document.getElementById("count").style.left='-593px';
			document.getElementById("timer").style.left='-329px';
			document.getElementById("time").style.left='-327px';
			document.getElementById("note_area").blur();
			document.getElementById("font11").style.left='-595px';
			document.getElementById("share_button").style.left='-255px';
		}
		function afterSharing(){
			if(clickDisabled) return;
			if(shared==0){
				beforeSharing();
				shared=1;
				document.getElementById("note_area").style['-webkit-transform']="translateX(-635px) rotateX(720deg) scale(0,0)";
				document.getElementById("note_area").style['-moz-transform']="translateX(-635px) rotateX(720deg) scale(0,0)";
				document.getElementById("note_area").style['-ms-transform']="translateX(-635px) rotateX(720deg) scale(0,0)";
				document.getElementById("note_area").style['-o-transform']="translateX(-635px) rotateX(720deg) scale(0,0)";
				document.getElementById("note_area").style['transform']="translateX(-635px) rotateX(720deg) scale(0,0)";
				document.getElementById("share_button").value="AGAIN?";
			}else{
				shared=0;
				document.getElementById("note_area").style['-webkit-transform']="rotateX(0deg) translateX(0px) scale(1,1)";
				document.getElementById("note_area").style['-moz-transform']="rotateX(0deg) translateX(0px) scale(1,1)";
				document.getElementById("note_area").style['-ms-transform']="rotateX(0deg) translateX(0px) scale(1,1)";
				document.getElementById("note_area").style['-o-transform']="rotateX(0deg) translateX(0px) scale(1,1)";
				document.getElementById("note_area").style['transform']="rotateX(0deg) translateX(0px) scale(1,1)";
				document.getElementById("note_area").value="";
				document.getElementById("share_button").value="SHARE";
			}
			clickDisabled = true;
      		setTimeout(function(){clickDisabled = false;}, 2000);
		}
		function beforeSharing(){
    		$.post(
        		"ajax_share_secret.php",
        		"content="+$("#note_area").val()+"&counter="+$("#counter").val()+"&timer="+$("#timer").val(),
        		function(responseStr){
            		//error message at responseStr
            		//alert("SUCCESS");
        		}
    		);
		}
	</script>
	<p id="compose_icon" class="compose" style="position:absolute;left:16px;bottom:90px;" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()"></p>
	<center id="font7" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()">S<br>h<br>a<br>r<br>e<br>.</center>
	<?php
		if($_SESSION['email']!=null) echo '<p id="font9" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()">Hello stranger.</p>';
		else echo '<p id="font9" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()">Hello stranger. Would you like to <a href="sharesecret_login.php">Log In</a>?</p>';
	?>
	<p id="font10" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()">The secret that you are about to share, would be shared <font color="#CCCCCC">ANONYMOUSLY</font>.<br>Meaning, <font color="#CCCCCC">no one would ever know who you are</font>.</p>
	<wordfont11 id="font12" style="position:absolute;left:-435px;top:300px;" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()">Your secret is safe with us.</wordfont11>
	<textarea name="content" id="note_area" class="notes" style="position:absolute;left:-600px;top:65px;" placeholder="Tell us a secret." onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()"></textarea>
	
	<input name="counter" id="counter" type="range" min="1" max="10" step="1" value="4" onchange="outputUpdate1(this.value)" oninput="outputUpdate1(this.value)" style="width:250px;opacity:0.5;position:absolute;left:-595px;top:610px;" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()">
	<wordfont11 for="counter" id="count" style="position:absolute;left:-593px;top:630px;" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()">10 people can read your secret.</wordfont11>
	<script>
		function outputUpdate1(val) {
			if(val==1){
				document.querySelector('#count').innerHTML = "1 person can read your secret.";
			}else if(val==2){
				document.querySelector('#count').innerHTML = "3 people can read your secret.";
			}else if(val==3){
				document.querySelector('#count').innerHTML = "5 people can read your secret.";
			}else if(val==4){
				document.querySelector('#count').innerHTML = "10 people can read your secret.";
			}else if(val==5){
				document.querySelector('#count').innerHTML = "25 people can read your secret.";
			}else if(val==6){
				document.querySelector('#count').innerHTML = "50 people can read your secret.";
			}else if(val==7){
				document.querySelector('#count').innerHTML = "100 people can read your secret.";
			}else if(val==8){
				document.querySelector('#count').innerHTML = "250 people can read your secret.";
			}else if(val==9){
				document.querySelector('#count').innerHTML = "500 people can read your secret.";
			}else if(val==10){
				document.querySelector('#count').innerHTML = "1000 people can read your secret.";
			}
		}
	</script>
	
	<input name="timer" id="timer" type="range" min="1" max="10" step="1" value="3" onchange="outputUpdate2(this.value)" oninput="outputUpdate2(this.value)" style="width:250px;opacity:0.5;position:absolute;left:-329px;top:610px;" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()">
	<wordfont11 for="timer" id="time" style="position:absolute;left:-327px;top:630px;" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()">Your secret will last 30 minutes.</wordfont11>
	<script>
		function outputUpdate2(val) {
			if(val==1){
				document.querySelector('#time').innerHTML = "Your secret will last 1 minute.";
			}else if(val==2){
				document.querySelector('#time').innerHTML = "Your secret will last 10 minutes.";
			}else if(val==3){
				document.querySelector('#time').innerHTML = "Your secret will last 30 minutes.";
			}else if(val==4){
				document.querySelector('#time').innerHTML = "Your secret will last 1 hour.";
			}else if(val==5){
				document.querySelector('#time').innerHTML = "Your secret will last 3 hours.";
			}else if(val==6){
				document.querySelector('#time').innerHTML = "Your secret will last 12 hours.";
			}else if(val==7){
				document.querySelector('#time').innerHTML = "Your secret will last 1 day.";
			}else if(val==8){
				document.querySelector('#time').innerHTML = "Your secret will last 3 days.";
			}else if(val==9){
				document.querySelector('#time').innerHTML = "Your secret will last 1 week.";
			}else if(val==10){
				document.querySelector('#time').innerHTML = "Your secret will last 1 month.";
			}
		}
	</script>
	
	<wordfont11 id="font11" style="position:absolute;left:-595px;top:670px;" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()">Your secret will be DELETED afterwards.</wordfont11>
	
	<input class="share_button" name="sharesecret" type="submit" value="SHARE" id="share_button" style="position:absolute;left:-255px;top:655px;" onmouseover="showLeftBanner1()" onmouseout="hideLeftBanner1()" onclick="afterSharing()"></input>
	
	<script>
		var clickDisabled3=true;
		
		function hideSecret(){
			if(clickDisabled3) return;
			document.getElementById("display_textarea_time").style.top="-575px";
			document.getElementById("display_textarea_readcount").style.top="-40px";
			document.getElementById("display_textarea").style.top="-550px";
			document.getElementById("display_window").style.opacity="0";
			document.getElementById("display_window").style.zIndex="-1";
			clickDisabled3=true;
		}
	</script>
	
	<secretwindow id="display_window" onclick="hideSecret()"></secretwindow>
	<textarea readonly class="notes2" id="display_textarea" style="position:absolute;left:350px;top:-550px;"></textarea>
	<wordfont11 id="display_textarea_readcount" style="position:absolute;left:360px;top:-40px;z-index:4;">100 people have read this secret.</wordfont11>
	<wordfont11 id="display_textarea_time" style="font-size:16px;position:absolute;left:360px;top:-575px;z-index:4;">DATE DATE DATE</wordfont11>
	
</body>

</html>