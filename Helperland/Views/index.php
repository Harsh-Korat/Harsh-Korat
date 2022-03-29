<!DOCTYPE html>
<html lang="en">
<head>
       
    <title>Homepage</title>
   
    <link rel="stylesheet" href="../assets/css/validation.css">
    <link rel="stylesheet" href="../assets/css/nav-headers.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 

<?php 
  session_start();   

  $base_url = "http://localhost/Helperland/";
 ?>

<style>
  
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

/* Header  Navbar*/

* {
margin: 0;
padding: 0;
}

body {
font-family: Roboto;
}

.navbar-brand img {
width: 175px;
height: 130px;
margin-left: 17px;
margin-top: 10px;
}

.navbar-nav {
padding-top: 43px;
padding-bottom: 57px;
position: absolute;
right: 15px;
}

.navbar .navbar-nav .nav-item .nav-link {
font-size: 17px;
color: #ffffff;
}

.navbar .navbar-nav .nav-item .nav-link:hover {
color: #006072 !important;
border-radius: 20px;
background-color: #ffffff !important;
border: solid 1px rgba(255, 255, 255, 0.5);
}

.nav-menu {
width: 545px;
height: 16px;
text-align: right;
line-height: 1.41;
}

.nav-menu a {
text-decoration: none;
display: inline-block;
padding-top: 6px;
}

.nav-item #nav1 {
width: 161px;
height: 40px;
position: relative;
line-height: 1.41;
text-align: center;
border-radius: 20px;
padding-top: 7px;
border: solid 1px rgba(255, 255, 255, 0.5);
}

.nav-item #nav2 {
width: 97px;
height: 40px;
padding-top: 6px;
border-radius: 20px;
border: solid 1px rgba(255, 255, 255, 0.5);
font-size: 16px;
margin-left: 20px;
line-height: 1.5;
text-align: center;
color: #fff;
position: relative;
}

.nav-item #nav3 {
width: 161px;
height: 40px;
padding-top: 6px;
border-radius: 20px;
border: solid 1px rgba(255, 255, 255, 0.5);
font-size: 16px;
margin-left: 11px;
line-height: 1.5;
text-align: center;
color: #fff;
}

.dropdown {
position: relative;
padding-top: 5px;
margin-top: -8px;
padding-bottom: 14px;
padding-left: 25px;
}

.dropdown-menu {
position: absolute;
right: 0px;
left: auto;
}

.ipsum-text {
font-size: 50px;
color: #FFFFFF;
font-weight: medium;
}

.bg-img {
padding-top: 318px;
background-image: url('../assets/image/Landing-Page-background-image.png');
background-size: cover;
}

.bg-img ul {
list-style-type: none;
padding-left: 55px;
}

.bg-img ul li {
position: relative;
color: #fff;
padding-left: 29px;
margin-bottom: 5px;
line-height: 1.38;
}

.bg-img ul li:before {
position: absolute;
content: '';
left: 0;
top: 5px;
width: 13px;
height: 10px;
background-image: url('../assets/image/ic-check.png');
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}

.book-btn {
display: inline-block;
background-color: rgba(0, 96, 114, 0.6);
border-radius: 27px;
border: 1px solid #FFFFFF;
height: 54px;
line-height: 52px;
color: #ffffff !important;
text-decoration: none !important;
min-width: 225px;
font-size: 18px;
transition: all 0.5s ease;
}

.book-btn:hover{
background-color: #ffffff;
color:#006072 !important;
}

.bg-img .svg-imges {
width: 1085px;
margin-left: auto;
margin-right: auto;
margin-top: 157px;
}

.row .col-lg-3 {
text-align: center;
padding: 0;
position: relative;
}

.row .col-lg-3 .col-lg-3 .svg {
padding-left: 135px;
}

.bg-img .svg-imges .row .col-lg-3+.col-lg-3 .svg:before {
position: absolute;
content: '';
top: 20px;
left: -30px;
width: 85px;
height: 23px;
background-image: url('../assets/image/step-arrow-1.png');
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}

.svg span {
display: block;
margin-bottom: 36px;
}

.bg-img .svg-imges .row .svg span img {
display: inline-block;
max-width: 62px;
}

.svg p {
color: #fff;
font-size: 20px;
line-height: 1.2;
margin-bottom: 0;
}

.down-bttn {
margin-top: 42px;
padding-bottom: 6%;
position: relative;
margin-left: auto;
margin-right: auto;
width: 40px;
cursor: pointer;
}

.eclipce {
width: 40px;
height: 40px;
position: absolute;
}

.download {
padding: 7px 12px 5px 12px;
position: absolute;
width: 16px;
height: 20px;
}

.download:hover, .eclipce:hover{
background: #006072;
width: 40px;
border-radius: 50%;
height: 40px;
border: 1px solid #ffffff;
}

.scrolling-active {
background-color: #525252;
height:75px;
}

.scrolling-active .navbar-brand img {
width: 95px;
height: 65px;
}

.scrolling-active .navbar-nav {
padding-top: 20px;
padding-bottom: 5px;
}

.scrolling-active #nav1 {
background-color: #006072;
}

.scrolling-active #nav2 {
background-color: #006072;
}

.scrolling-active #nav3 {
background-color: #006072;
}


.notification-bttn{
position: relative !important;
display: inline-flex;
justify-content: center;
margin-right: 30px;
font-size: 25px;


}

.notification-bttn::before{
content: '';
position: absolute;
right: -18px !important;
width: 1px;
height: 48px;
background: #E1E1E1 0% 0% no-repeat padding-box;
}

.notification-bttn::after{
content: '';
position: absolute;
left: 38px !important;
width: 1px;
height: 48px;
background: #E1E1E1 0% 0% no-repeat padding-box;
}

.dropdown-menu .dropdown-item{
color: black !important;
}

.Ellipse-5 {
position: absolute;
width: 20px;
height: 22px;
top:3px;
font-size: 15px;
left:22px;
text-align: center;
border-radius: 22px;
background: #FF1616 0% 0% no-repeat padding-box;
right:115px;
}


.user-logo {
position: relative !important;
display: inline-flex;
justify-content: center;
width: 36px;
height: 36px;
padding: auto;
margin-right: 40px;
margin-top:-13px;
}

.dropdown-toggle{
color: white !important;
}

.dropdown-toggle:hover{
color: white;
}
#menu {
margin-left: 0px !important;
}
#menu1{
margin-top: -10px !important;
}


/* Mobile Navbar */

#drop{
margin-left: -20px;
}

.mobile-nav{
display: none;
}
.bttn{
background-color: #525252 !important;
position: absolute;
right:20px;
}

.offcanvas-title{
font-size: 20px;
}

.hrr{
margin-top:30px;
width:250px;
}

.offcanvas-body{
margin-top: 10px;
padding-left: 0 !important;
padding-right: -20px !important;
font-size: 19px;
font-family: Roboto;
color: #646464;
}

.dash {
overflow: hidden;
background-color: white;
float: left;
font-family: Roboto;
}

.dash a {
padding-top: 8px;
padding-left: 15px;
display: block;
height: 45px;
color: #646464 !important;
text-align: left;
text-decoration: none !important;
margin-top:5px;
}

.dash a:hover {
background-color: rgb(240,240,240) !important;
font-weight: bold;
color: #146371 !important;
}

.dash .face{
display: flex; 
margin-left: 70px;
}
.dash .btn{
margin-left:10px;
}

.dash .btn:hover{
background-color: rgb(180,180,180);
cursor: pointer;
border-radius: 15px;
}

.notify{
position: absolute;
right:110px;
}

.notify::before{
content: '';
position: absolute;
right: -15px;
width: 2px;
height: 48px;
background: #E1E1E1 0% 0% no-repeat padding-box;
}

.notify::after{
content: '';
position: absolute;
left: 13px;
width: 2px;
height: 48px;
background: #E1E1E1 0% 0% no-repeat padding-box;
}

.Ellipse-5 {
position: absolute;
width: 20px;
height: 22px;
top:3px;
font-size: 15px;
left:55px;
text-align: center;
border-radius: 22px;
background: #FF1616 0% 0% no-repeat padding-box;
right:115px;
}


/* Media Queries for Navbar */

@media screen and (max-width: 992px) {
.mobile-nav .navbar{
position: fixed;
width: 100%;
height: 70px;
background: #525252 0% 0% no-repeat padding-box;
}
 .navbar-logo1 img {
width: 90px !important;
height: 60px !important;
margin-top: -3px !important;
}
.mobile-nav{
display: block;
}
.header-nav{
display: none;
}

.fa-bars {
color: white;
font-size: 30px;
margin-top: 0px;
margin-right: 0px;
}

a {
color: #646464 !important;
}
}

/* Login modal */

.modal-header{
border-bottom: none !important;
padding-bottom: 1px !important;
}

.modal-title{
margin-left: 10px;
font-size: 30px;
}

.form-control{
height: 50px;
}

#login,#password{
position: relative;
}

.mail {
top: 50px;
position: absolute;
right: 50px;
}

.locks {
position: absolute;
}
.checkbox{
display: flex;
}

input[type=checkbox]{
margin-top: 2px;
width: 20px;
height: 20px;
}

label{
margin-left: 10px;
}

.form-control::placeholder{
font-size: 18px;
color: #646464;
}

.btn-login ,.btn-login:focus{
height: 50px;
font-size: 20px !important;
font-weight: medium;
background-color: #006072 !important;
opacity: 0.6;
border-radius: 30px !important;
color: #ffffff !important;
border: solid 1px rgba(255, 255, 255, 0.5);
}

.btn-login:hover{
opacity: 1;
}

.forgot-password,.creat-account{
color: #1d7a8c !important;
font-size: 19px;
text-decoration: none;
}

.footer {
justify-content: center;
display: grid;
text-align: center;
}

.footer p{
font-size: 19px;
}

.forgot-password:hover,.creat-account:hover{
text-decoration: none;
font-weight: 500;
color: #006072 !important;
}

#creat-account{
margin-top: -10px;
}

@media screen and (max-width: 575px) {
.modal-body{
padding-left: 7px !important;
padding-right: 7px !important;
}
.modal-title{
margin-left: 7px;
}
#forgot{
font-size: 25px;
}
}

/* Helperland */

.helperland{
margin-left:auto;
margin-right: auto;
width: 1119px;
height: 780px;
}

.helperland-title h2{
margin-top: 79px;
margin-left:auto;
margin-right: auto;
text-align: center;
letter-spacing: 0px;
color: #4F4F4F;
font-size: 40px;
font-family: Roboto;
}

.helperland-img img{
width: 320px;
height: 320px;
margin-top: 82px;
}

.helperland-img-title h4{
margin-top: 33px;
height: 73px;
font-size: 30px;
font-family: Roboto;
font-weight: bold;
text-align: center;
letter-spacing: 0px;
color: #565656;
  }

.helperland-img-title p{
margin-top:29px;
font-size: 17px;
font-family: Robot;
text-align: center;
letter-spacing: 0px;
color: #565656;
  }


  /*lorem style*/


.lorem-main{
margin-top: 170px;
  } 

.inner{
margin-left: auto;
margin-right: auto;
width: 1162px;
height: 929px;
}

 .lorem h2{
margin-top: 36px;
text-align: left;
letter-spacing: 0px;
color: #4F4F4F;
font-size: 30px;
font-family: Roboto;
font-weight: bold;
 }

 .lorem-bottom {
margin-top: 8px;
font-size: 18px;
font-family: Roboto;
text-align: left;
letter-spacing: 0px;
color: #4F4F4F;
 }

 .lorem-bottom p{
  margin-left: 2px;
 }

.lorem-right{
float: right;
margin-top: 0px;
 }

.lorem-left1, .lorem-left{
margin-top: -63px;
}

/* our blog style*/

.blog-title{
margin-top: 30px;
margin-left: auto;
margin-right: auto;
font-size: 40px;
font-family: Roboto;
font-weight: bold;
text-align: center;
letter-spacing: 0px;
color: #4F4F4F;
}

.blog-main{
margin-top: 64px;
margin-left: 2px;
width: 357px;
height: 367px;
background: #FFFFFF 0% 0% no-repeat padding-box;
box-shadow: 0px 0px 30px #E4EBF0;
border-radius: 4px;
}

.blog-image img{
width: 357px;
height: 164px;
}

.blog-image-title{
margin-top: 12px;
margin-left: 19px;
text-align: left;
letter-spacing: 0px;
color: #3D4046;
font-family: Roboto;
}

.blog-image-text{
margin-left: 20px;
font-size: 16px;
font-family: Roboto;
text-align: left;
letter-spacing: 0px;
color: #565656;
}

.image-bottom{
margin-top: 3px;
margin-left: 19px;
float:left;
height: 21px;
font-size:18px;
font-family: Roboto;
text-align: left;
letter-spacing: 0px;
color: #4F4F4F;
}

.icon-img{
 margin-top: 3px;
margin-left: 10px;
float:left;
}


/* Customer */

.customer{ 
width: 100%;
height: 908px;
background: #F4F5F8 0% 0% no-repeat padding-box;
}

 .customer-title{
padding-top: 57px;
margin-left: auto;
margin-right: auto;
text-align: center;
letter-spacing: 0px;
color: #4F4F4F;
font-size: 40px;
font-family: Roboto;
 }  

 .customer-main1{
margin-top: 57px;
margin-left:auto;
margin-right: auto;
width:1158px;
height:370px;
 }

 .customer-main{
position: relative;
width: 357px;
background-color: white;
height: 370px;
border-left:2px solid #1d7a8c;
}

.messages{
position: absolute;
top:10px;
right: 10px;
width: 33px;
height: 36px;
}

 .customer-img{
margin-top: 43px;
margin-left: 38px;
width: 70px;
height: 70px;
float: left;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

.customer-img-title{
font-family: Roboto;
margin-top: 55px;
margin-left: 17px;
text-align: right;
letter-spacing: 0px;
color: #4F4F4F;
float:left;
}
.customer-img-title h6{
  font-family: Roboto;
  font-size: 20px;
  font-weight: bold;
}

.customer-img-title p{
font-family: Roboto;
padding-top:5px;
margin-right: 30px;
}

.customer-bottom{
margin-top: 25px;
font-family: Roboto;
margin-left: 38px;
width: 295px;
height: 233px;
text-align: left;
letter-spacing: 0px;
color: #565656;
}


/* Footer */

.nsletter {
height: 130px;
margin-top: 51px;
position: relative;
}

.nsletter h1 {
text-align: center;
font-size: 36px;
}

.whatsapp{
position: absolute;
top: 10px;
right: 72px;
width: 63px;
height: 63px;
cursor: pointer;
}

.arrow1{
position: absolute;
top: 10px;
left: 70px;
width: 48px;
height: 48px;
background: #525252;
border-radius: 48px;
padding-top:10px;
transition: all 0.5s ease;
}

.arrow1:hover{
background-color: teal;
cursor: pointer;
}

.nsletter h3 {
text-align: center;
font-size: 30px;
padding: 20px;
font-weight: 400;
letter-spacing: 1px;
}

.nsletter input[type=text] {
width: 233px;
height: 40px;
background: #F4F5F8 0% 0% no-repeat padding-box;
border: 1px solid #565656;
border-radius: 20px;
padding-left: 20px;
font-family: Roboto-Regular;
}

.nsletter ::placeholder {
font-size: 14px;
width: 90px;
height: 16px;
text-align: left;
letter-spacing: 0px;
color: #565656;
}

.nsletter .news {
letter-spacing: 0px;
color: #353548;
font-family: Roboto;
font-size: 18px;
font-weight: bold;
}

.nsletter .submit {
width: 88px;
height: 40px;
background: #FF7B6D 0% 0% no-repeat padding-box;
border-radius: 20px;
font-family: Roboto-Regular;
padding-top: 8px;
padding-left: 20px;
}

.nsletter .submit:hover{
background-color: #006072;
transition: all 0.5s ease;
}

.nsletter .submit p {
font-size: 14px;
width: 44px;
height: 16px;
text-align: center;
letter-spacing: 0px;
color: #FFFFFF;
}

.footers{
background-color: #111111;
margin-top: 53px;
}

footer {
margin-top: 30px;
background-color: #111111;
overflow: hidden;
}

.bottom-first {
margin-top: 20px;
margin-left: 115px;
}

.bottom-logo{
width: 120px;
height: 92px;
}

.bottom-middle {
margin:auto !important;
}

.nav-bottom {
width: 582px;
text-align: left;
letter-spacing: 0px;
color: #F1F1F1;
display: flex;
height: 43px;
}

.nav-bottom a{
color: white;
font-size: 14px;
padding-top: 10px;
}

.nav-bottom a:hover {
color: white;
background-color: teal;
}

.nav-last {
justify-content: center;
padding-top: 10px;
}

.nav-last a:hover {
color: white;
background-color: teal;
}

footer hr {
margin-left: 120px;
margin-right: 120px;
border-top: 1px solid #424242;
}

.privacy {
position: relative;
margin-bottom: 22px;
margin-top: 25px;
width: 240px;
text-align: center;
color: #9BA0A3;
font-size: 14px;
}

.ok-btn{
position: absolute;
bottom: 0px;
padding-top: 9px;
color: black;
right: 20px;
width: 99px;
height: 40px;
background: #EED507 0% 0% no-repeat padding-box;
border-radius: 20px;
}

.ok-btn:hover{
background-color: #006072;
transition: all 0.5s ease;
color: white;
cursor: pointer;
}

.term {
padding-left: 10px;
display: inline-block;
}

.term:hover{
cursor: pointer;
color: blue;
}
  
.error-message {
color: red;
margin-left: 0px;
} 

/* Spinner */

@keyframes spinner {
  to {transform: rotate(360deg);}
}
 
.spinner:before {
  content: '';
  box-sizing: border-box;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 70px;
  height: 70px;
  margin-top: -10px;
  margin-left: -10px;
  border-radius: 50%;
  border: 6px solid transparent;
  border-top-color: #07d;
  border-bottom-color: #07d;
  animation: spinner .8s ease infinite;
}

.parent-spinner{
position:fixed; 
top:0; 
left:0; 
width: 100%; 
height: 100vh;
display: flex; 
justify-content: center;
align-items: center; 
background-color: 
rgba(0,0,0,0.4); 
z-index: 999;
}


/*  Media Queries  for Footer */

@media screen and (max-width:1250px) {
.bottom-logo {
width: fit-content;
margin-left: auto;
margin-right: auto;
}
footer .row {
flex-direction: column;
align-items: center;
 }
}

@media screen and (max-width: 950px) {
.bottom-logo{
width: fit-content;
margin-left: auto;
margin-right: auto;
}
footer .row {
flex-direction: column;
align-items: center;
}
footer .bottom-first .img {
width: 60px;
height: 42px;
}
footer .nav-bottom {
margin-left: auto;
margin-right: auto;
display: table-cell;
}
footer .bottom-first, .nav-bottom {
margin-left: auto;
margin-right: auto;
display: flex;
width: 100%;
flex-direction: column;
justify-content: center;
margin-bottom: 2px;
}
.nav-last {
display: flex;
flex-direction: column;
}
}

@media screen and (max-width: 600px) {
footer .col-md-4 a, footer .col-md-4 img {
float: none;
}
.bottom-logo{
 width: fit-content;
 margin-left: auto;
 margin-right: auto;
}
}

/* Media Queries For all */


@media screen and (max-width: 1250px) {
.lorem-left img, .lorem-left1 img{
display: none;
}
.lorem-main{
width: 96%;
margin-left: 15px;
}
 .customer{
width: 100%;
}
 .customer-main1{
width: 95%;
}
}

@media screen and (max-width: 1190px) {
.bg-img .svg-imges {
width: 800px;
}
.helperland {
width: 90%;
height: 730px;
}
.lorem-main{
width: 94%;
margin-top: 0px;
margin-left: 25px;
}
.inner{
width: 100%;
}
.helperland-img img{
width: 240px;
height: 240px;
}
.helperland-img-title h4{
font-size: 25px;
}
.helperland-img-title p{
font-size: 15px;
}
.lorem h2{
margin-top: 25px;
}
 .lorem-bottom {
font-size: 15px;
 }
.lorem-right img{
width:330px;
height: 290px;
 }
 .blog-image img{
width: 310px;
}
.blog-main{
width: 310px;
}
.blog-image-text p{
width: 98%;
}
 .customer-main{
width: 357px;
background-color: white;
height: 370px;
}
 .customer-main{
width: 320px;
margin-left: 10px;
}
.customer-bottom{
margin-left: 12px;
}
}

@media screen and (max-width: 1038px) {
.customer-main1{
margin-left: 5px;
}
}

@media screen and (max-width:992px){
.svg-imges .row .col-lg-3:nth-child(odd) .svg:before {
display: none;
}
}

@media screen and (max-width: 991px) {
.blog-main{
width: 100%;
height: 580px;
margin-left: 5px;
margin-bottom: -30px;
}
.blog-image img{
width: 100%;
height: 350px;
}
.blog-image-title{
margin-top: 12px;
margin-left: 19px;
}
.blog-image-text{
margin-left: 20px;
font-size: 16px;
}
.customer{ 
margin-top: 1430px;
width: 100%;
height: 1550px;
}
 .customer-title{
font-size: 40px;
}  
.customer-main{
margin-bottom: 15px;
width: 98%; 
height: 370px;
}
.customer-main1{
margin-left: 20px;
}
.nsletter{
margin-top: 820px;
}
.customer-bottom{
margin-left: 38px;
width: 90%;
}
.ipsum-text {
margin-top: -190px;
}
.bg-img ul{
margin-bottom: 50px;
}
.whatsapp{
right: 20px;
}
.arrow1{
left:20px;
}
}

@media screen and (max-width: 880px) {
.bg-img .svg-imges {
max-width: 600px;
}
.blog-image img{
width: 100%;
height: 300px;
}
.helperland {
margin-left: 20px;
}
.helperland-img-title p{
font-size: 13px;
}
.down-bttn {
padding-bottom: 12%;
}
}

@media screen and (max-width: 767px){
.helperland{
margin-left:auto;
margin-right: auto;
width: 95%;
height: 1650px;
}
.helperland-title{
margin-top: 60px;
}
.helperland-title h2, .blog-title{
font-size: 35px;
}
.helperland-img img{
width: 320px;
height: 320px;
margin-top: 45px;
margin-left: auto;
margin-right: auto;
display: block;
}
.helperland-img-title h4{
font-size: 28px;
}
.helperland-img-title p{
font-size: 18px;
margin-top: -30px;
width: 97%;
margin-left: 10px;
}
.lorem-main{
width: 94.5%;
margin-left: 15px;
}
 .lorem h2{
margin-top: 36px;
text-align: center;
font-size: 30px;
 }
 .lorem-bottom p{
margin-top: 25px;
font-size: 18px;
 }
.lorem-right{
float: none;
margin-top: 30px;
margin-bottom: 60px;
}
.lorem-right img{
display: block;
width: auto;
height: auto;
margin-left: auto;
margin-right: auto;
 }
.blog-image img{
height: 270px;
}
.customer{
margin-top: 1600px;
}
.blog-main{
height: 500px;
margin-left: 3px;
}
 .customer-main{
margin-left: 3px;
width: 98%;
}
.privacy{
margin-bottom: 60px;
}
.ok-btn{
bottom: -40px;
}
}

@media screen and (max-width: 710px){
.customer-main1{
margin-left: 10px;
}
.customer-main1{
width: 95%;
}
}

@media screen and (max-width: 650px){
.bg-img .svg-imges {
max-width: 500px;
}
.down-bttn {
padding-bottom: 15%;
}
}

@media screen and (max-width: 600px){
.customer{
margin-top: 1600px;
}
.blog-main{
height: 470px;
}
.blog-image img{
height: 230px;
}
}

@media screen and (max-width: 575px){
.bg-img .svg-imges {
margin-top: 100px;
width: 400px;
}
.svg1 span img, .svg2 span img, .svg3 span img{
margin-top: 100px;
}
.svg-imges .row .col-lg-3 .svg:before {
display: none;
}
.down-bttn {
padding-bottom: 10%;
}
}

@media screen and (max-width: 522px){
.helperland-title h2, .blog-title{
font-size: 30px;
}
.ipsum-text {
margin-left: -30px;
font-size: 35px;
}
.bg-img ul li{
margin-left: -30px;
}
.helperland{
width: 92%;
height: 1550px;
}
.helperland-img-title h4{
font-size: 19px;
}
.helperland-img-title p{
margin-top: -40px;
font-size: 14px;
}
.lorem-main{
width: 94%;
}
.inner{
width: 95%;
}
.lorem h2{
font-size: 22px;
margin-top: 60px;
 }
.lorem-bottom p{
font-size: 14px;
 }
.lorem-right img{
width: 300px;
height: 250px;
 }
.customer-title{
font-size: 27px;
 }  
.blog-title{
font-size: 32px;
}
.blog-image img{
height: 200px;
}
.customer{
margin-top: 1350px !important;
}
.blog-main{
height: 430px;
margin-left:0px;
}
.whatsapp img{
width:40px;
height:40px;
}
.arrow1{
width:35px;
height:35px;
padding: 3px 2px 2px 2px;
top:30px;
}
.whatsapp{
top:115px;
}
.arrow1{
top:115px;
}
.nsletter input[type=text] {
width: 180px;
}
.blog-image-title h5, .blog-image-title p, .blog-image-text p{
margin-left: -10px;
}
.customer-main1{
width: 94%;
}
}

@media screen and (max-width: 460px){
.down-bttn {
padding-bottom: 15%;
}
.bg-img .svg-imges {
margin-top: 100px;
width: 250px;
}
.svg1{
margin-top: -50px;
margin-left: 60px;
width: 100%;
}
.svg1 span p{
max-width: 250px;
}
.svg2{
margin-top: 140px;
margin-left: -150px;
}
.svg3{
margin-top: -50px;
}
.blog-image img{
height: 180px;
}
.blog-main{
height: 410px;
margin-left: -2px;
}
.helperland-img img{
width: 250px;
height: 250px;
}
.helperland{
height: 1350px;
}
.customer-bottom{
margin-left: 20px;
width: 90%;
}
.customer-main{
height: 420px;
}
.customer-main1{
width: 92%;
}
.nsletter{
margin-top: 960px;
}
.customer{ 
height: 1650px;
margin-top: 1350px !important;
}
.customer-img{
margin-left: 10px;
}
}

@media screen and (max-width: 368px){
.lorem-main{
width: 93.5%;
}
.customer{
margin-top: 1300px !important;
}
.helperland-img img{
width: 220px;
height: 220px;
}
.helperland{
height: 1300px;
}
 .lorem-right img{
width: 250px;
height: 200px;
}
.blog-image-title h5{
font-size: 17px;
}
}

@media screen and (max-width: 345px){
.helperland{
width: 90%;
}
.helperland-img-title h4{
font-size: 17px;
}

.lorem-main{
width: 90%;
}
.blog-main{
height: 390px;
}
.blog-image img{
height: 160px;
}
.customer{
margin-top: 1440px;
}
.customer-title{
font-size: 24px;
} 
.customer-bottom{
margin-left: 10px;
}
.customer-main1{
width: 90%;
margin-left: 8px;
}
}


</style>

</head>

<body>


<?php include('./Header-nav.php'); ?>

<section class="bg-img">

 <ul>    
  <h1 class="ipsum-text"> Lorem ipsum text</h1>
  <li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
  <li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
  <li>Lorem ipsum dolor sit amet, consectetur adipiscing</li>
 </ul>

 <div class="text-center">
  <a class="book-btn" href="./book-service.php" role="button">Let’s Book a Cleaner</a>
 </div>

    <div class="svg-imges">
      <div class="row justify-content-center">
          <div class="col-lg-3 col-sm-6 col-12">
              <div class="svg">
                  <span>
                    <img src="../assets/image/forma-1-copy.svg" alt="image1">
                </span>
                  <p>Enter your postcode</p>
              </div>
          </div>
          <div class="col-lg-3 col-6">
              <div class="svg svg1">
                  <span>
                    <img src="../assets/image/step-2.png" alt="image2">
                </span>
                  <p>Select your plan</p>
              </div>
          </div>
          <div class="col-lg-3 col-6">
              <div class="svg svg2">
                  <span>
                    <img src="../assets/image/forma-1.svg" alt="image3">
                </span>
                  <p>Pay securely online</p>
              </div>
          </div>
          <div class="col-lg-3 col-6">
              <div class="svg svg3">
                  <span>
                    <img src="../assets/image/forma-1 (1).svg" alt="image4">
                </span>
                  <p>Enjoy amazing service</p>
              </div>
          </div>
      </div>
  </div>

<div class="down-bttn">
  <img src="../assets/image/ellipse-525.svg" class="eclipce">
     <div class="download">
        <a href="#helperland"><img src="../assets/image/shape-1.svg" alt="" class="download1"></a>
     </div>
</div>

</section>
  

<!-- Login Modal -->
  
<div class="modal fade" id="myModal">
 <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title"><b>Log in</b></h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
                        
     <div class="modal-body">
      <div class="container mt-1">
        <form  method="POST">
         <div class="mt-3">
           <input type="email" class="form-control" id="loginemail" placeholder="E-Mail" name="loginemail" required>
           <span><i class="fa fa-user mail"></i></span>
         </div>
         <div class="email-msg mails mb-2 mt-2"></div>

         <div class="mt-3 mb-3" style="position: relative;">
           <input type="password" class="form-control" id="currentpassword" placeholder="Password" name="password" required>
           <span><i class="fa fa-lock locks" style="top:17px;right:23px;"></i></span>
           <div class="current-password-msg mt-2"></div>
         </div>

         <div class="checkbox mb-3">  
           <input type="checkbox" name="checkbox">
           <label>Save on computer</label>
         </div>

         <div class="form-group mt-2">
           <button type="submit" class="btn btn-login form-control home-login">Login</button>
         </div>
        </form>
      </div>
   
      <div class="footer mt-2"><a class="forgot-password" href="#" data-toggle="modal" data-target="#forgot-modal" data-dismiss="modal">Forgot Password?</a></div>
      <div class="footer mt-2"><p>Don't Have an account yet?</p></div>
      <div class="footer" id="creat-account"><a class="creat-account" href="./customer-signup.php">Create an account</a></div>
      </div>
     </div>
    </div>
   </div>
 </div>


<!-- Forgot Modal -->

<div class="modal fade" id="forgot-modal">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="forgot"><b>Forgot Password</b></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
         <div class="container">
          <form  method="POST">
           <div class="mt-3">
             <input type="email" class="form-control" id="login" placeholder="E-Mail" name="forgot_email" autocomplete="off" required>
           </div>
           <div class="email-message mails mb-2 mt-2"></div>

           <div class="form-group mt-4">
              <button type="submit" class="btn btn-login form-control home-forgot">Send</button>
           </div>
          </form>
         </div>
 
         <div class="footer mt-3"><a class="forgot-password" href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal">Log in now</a></div>
         </div>
        </div>
      </div>
   </div>


<!-- Helperland -->

<div class="helperland" id="helperland">
   <div class="helperland-title">
    <h2><b>Why Helperland</b></h2>
   </div>
       <div class="row">
         <div class="col-md-4 col-lg-4 col-sm-12 col-12">
           <div class="helperland-img">  
             <img src="../assets/image/helper-img-1.png" alt="helperland">
               <div class="helperland-img-title">     
                  <h4>Experience & Vetted Professionals</h4>
                      <p>dominate the industry in scale and scope with an adaptable, extensive network that consistently delivers exceptional results.</p>
                     
                  </div>
             </div>
           </div>

    <div class="col-md-4 col-lg-4 col-sm-12 col-12">
           <div class="helperland-img">  
             <img src="../assets/image/group-23.png" alt="helperlan">
               <div class="helperland-img-title">     
                  <h4>Secure Online Payment</h4>
                       <p>Payment is processed securely online. Customers pay safely online and manage the booking.</p>
                     </div>
               </div>
             </div>

     <div class="col-md-4 col-lg-4 col-sm-12 col-12">
           <div class="helperland-img">  
             <img src="../assets/image/group-24.png" alt="helperland">
               <div class="helperland-img-title">     
                  <h4>Dedicated Customer Service</h4>
                       <p>to our customers and are guided in all we do by their needs. The team is always happy to support you and offer all the information.</p>
                     </div>
             </div>
           </div>
         </div>
       </div>
    

<!-- lorem start-->


<div class="lorem-main">
  <div style="display: flex;">
       <div class="lorem-left">
        <img src="../assets/image/blog-left-bg.png" alt="Cinque Terre">
    </div>
     <div class="inner">
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12 col-12">
              <div class="lorem">
                <h2>Lorem ipsum dolor sit amet, consectetur</h2>
               </div>
                 <div class="lorem-bottom">
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nisi sapien, suscipit ut accumsan vitae, pulvinar ac libero. </p>
                   <p>Aliquam erat volutpat. Nullam quis ex odio. Nam bibendum cursus purus, vel efficitur urna finibus vitae. Nullam finibus aliquet pharetra. Morbi in sem dolor.Integer pretium hendrerit ante quis vehicula.</p>
                   <p>Mauris consequat ornare enim, sed lobortis quam ultrices sed.</p>
                 </div>
            </div>
                        
                <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                  <div class="lorem-right">
                     <img src="../assets/image/group-36.png" alt="">
                  </div>
              </div>
          </div>


<!-- Blog Section -->


  <h2 class="blog-title">Our Blog</h2>

    <div class="row">
      <div class="col-md-12 col-lg-4 col-sm-12 col-12">
         <div class="blog-main">
           <div class="blog-image">
             <img src="../assets/image/group-28.png" alt="Card image">
           </div>
               <div class="blog-image-title">
                 <h5><b>Lorem ipsum dolor sit amet</b></h5>
                 <p>January 28, 2019</p>
               </div>
                  <div class="blog-image-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet.</p>
                 </div>
                   <div class="image-bottom">Read the Post</div>
                   <div class="icon-img"><i class="fas fa-long-arrow-alt-right"></i></div>
                 </div>
               </div>
             <br>

      <div class="col-md-12 col-lg-4 col-sm-12 col-12">
         <div class="blog-main">
            <div class="blog-image">
              <img src="../assets/image/group-29.png" alt="Card image">
            </div>
             <div class="blog-image-title">
               <h5><b>Lorem ipsum dolor sit amet</b></h5>
               <p>January 28, 2019</p>
             </div>
               <div class="blog-image-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet.</p>
              </div>
               <div class="image-bottom">Read the Post</div>
               <div class="icon-img"><i class="fas fa-long-arrow-alt-right"></i></div>
              </div>
          </div>
        <br>

      <div class="col-md-12 col-lg-4 col-sm-12 col-12">
         <div class="blog-main">
            <div class="blog-image">
              <img src="../assets/image/group-30.png" alt="Card image">
            </div>
             <div class="blog-image-title">
               <h5><b>Lorem ipsum dolor sit amet</b></h5>
               <p>January 28, 2019</p>
             </div>
               <div class="blog-image-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet.</p>
              </div>
               <div class="image-bottom">Read the Post</div>
               <div class="icon-img"><i class="fas fa-long-arrow-alt-right"></i></div>
              </div>
          </div>
       </div>
    </div>

 <div class="lorem-left1">
  <img src="../assets/image/blog-right-bg.png" alt="Cinque Terre">
 </div>
 </div>
 </div>


 <!-- Customer Section -->


<div class="customer">
    <h4 class="customer-title"><b>What Our Customers Say</b></h4>


<div class="customer-main1">
   <div class="row">
     <div class="col-md-12 col-lg-4 col-sm-12 col-12">
      <div class="customer-main">  
       <img class="messages" src="../assets/image/message.png">  
        <div class="clearfix">
           <img class="customer-img"src="../assets/image/group-31.png" alt="">
             <div class="customer-img-title">
               <h6>Lary Watson</h6>
                <p>Manchester</p>
             </div>
        </div>
            <div class="customer-bottom">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed fermentum metus pulvinar aliquet consequat. Praesent nec malesuada nibh.</p>
               <p>Nullam et metus congue, auctor augue sit amet, consectetur tortor.</p>
               <p style="float:left;margin-right: 10px;">Read More</p><i class="fas fa-long-arrow-alt-right arrow"></i></p>
             </div>  
       </div>
     </div>  

<div class="col-md-12 col-lg-4 col-sm-12 col-12">
  <div class="customer-main">   
    <img class="messages" src="../assets/image/message.png">  
        <div class="clearfix">
           <img class="customer-img"src="../assets/image/group-32.png" alt="">
             <div class="customer-img-title">
               <h6>John Smith</h6>
                <p>Manchester</p>
             </div>
        </div>
            <div class="customer-bottom">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed fermentum metus pulvinar aliquet consequat. Praesent nec malesuada nibh.</p>
               <p>Nullam et metus congue, auctor augue sit amet, consectetur tortor.</p>
               <p style="float:left; margin-right: 10px;">Read More</p><i class="fas fa-long-arrow-alt-right arrow"></i></p>
             </div>    
      </div>
   </div>

<div class="col-md-12 col-lg-4 col-sm-12 col-12">
  <div class="customer-main">  
    <img class="messages" src="../assets/image/message.png">   
        <div class="clearfix">
           <img class="customer-img"src="../assets/image/group-33.png" alt="">
             <div class="customer-img-title">
               <h6>Lars Johnson</h6>
                <p>Manchester</p>
             </div>
        </div>
            <div class="customer-bottom">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed fermentum metus pulvinar aliquet consequat. Praesent nec malesuada nibh.</p>
               <p>Nullam et metus congue, auctor augue sit amet, consectetur tortor.</p>
               <p style="float:left;margin-right: 10px;">Read More</p><i class="fas fa-long-arrow-alt-right arrow"></i></p>
             </div>    
        </div>
    </div>
 </div>
</div>


<!-- Footer -->


 <section class="nsletter text-center ">
   <div class="whatsapp">
    <a href="#"><img src="../assets/image/layer-598.png"></a>
   </div>
  
    <div class="arrow1">
    <a href="#"><img src="../assets/image/up.png"></a>
    </div>
    
     <div class="container">
       <h3 class="news">GET OUR NEWSLETTER</h3>
        <form action="#" method="Post">
        <input type="text" name="text" placeholder="YOUR EMAIL">
        <button type="button" class="btn submit"><p>Submit</p></button>
        </form>
       </div>
   </section>


<footer>
        <div class="row">
            <div class="col-md-4">
                <nav>
                    <div class="bottom-first">
                      <a href="#">
                        <img class="bottom-logo" src="../assets/image/logo-small.png">
                      </a>
                    </div>
                </nav>
            </div>
            <div class="col-md-4 bottom-middle" style="padding-top: 20px;">
                <nav>
                    <div class="nav nav-bottom">
                        <a href="#" class="btn">HOME</a>
                        <a href="./about.php" class="btn">ABOUT</a>
                        <a href="#" class="btn">TESTIMONIALS</a>
                        <a href="./Faqs.php" class="btn">FAQS</a>
                        <a href="#" class="btn">INSURANCE POLICY</a>
                        <a href="#" class="btn">IMPRESSUM</a>

                    </div>
                </nav>
            </div>
            <div class="col-md-4 bottom-middle">
                <nav>
                    <div class="nav nav-last">


                        <a href="#" class="btn"><img src="../assets/image/ic-facebook.png" alt=""></a>
                        <a href="#" class="btn"><img src="../assets/image/ic-instagram.png" alt=""></a>
                    </div>
                </nav>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 privacy">
                ©2018 Helperland. All rights reserved. <p class="term"><a>Terms and Conditions</a> | <a>Privacy Policy</a>
                </p>
         <div class="ok-btn">OK!</div>
            </div>
            </div>
    </footer>

</div>


<!-- Boostrap -->
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>

    <?php include('./all-ajax.php'); ?>

    <script src="../assets/js/Homepage.js"></script>
    <script src="../assets/js/Login.js"></script>
    <script src="../assets/js/Signup.js"></script>


<!-- Spinner -->

 <div class="parent-spinner">
   <div class="spinner"></div>
 </div>

<script>
  
$('.login1').on('click',function(){
$('.mobile-nav').hide();


});


</script>


</body>
</html>