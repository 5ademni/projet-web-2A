<?php
header('Content-type: text/css; charset:UTF-8');
?>
/********** Template CSS **********/
:root {
    --primary: #FEA116;
    --light: #F1F8FF;
    --dark: #0F172B;
}

.ff-secondary {
    font-family: 'Pacifico', cursive;
}

.fw-medium {
    font-weight: 600 !important;
}

.fw-semi-bold {
    font-weight: 700 !important;
}

.back-to-top {
    position: fixed;
    display: none;
    right: 45px;
    bottom: 45px;
    z-index: 99;
}


/*** Spinner ***/
#spinner {
    opacity: 0;
    visibility: hidden;
    transition: opacity .5s ease-out, visibility 0s linear .5s;
    z-index: 99999;
}

#spinner.show {
    transition: opacity .5s ease-out, visibility 0s linear 0s;
    visibility: visible;
    opacity: 1;
}


/*** Button ***/
.btn {
    font-family: 'Nunito', sans-serif;
    font-weight: 500;
    text-transform: uppercase;
    transition: .5s;
}

.btn.btn-primary,
.btn.btn-secondary {
    color: #FFFFFF;
}

.btn-square {
    width: 38px;
    height: 38px;
}

.btn-sm-square {
    width: 32px;
    height: 32px;
}

.btn-lg-square {
    width: 48px;
    height: 48px;
}

.btn-square,
.btn-sm-square,
.btn-lg-square {
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: normal;
    border-radius: 2px;
}


/*** Navbar ***/
.navbar-dark .navbar-nav .nav-link {
    position: relative;
    margin-left: 25px;
    padding: 35px 0;
    font-size: 15px;
    color: var(--light) !important;
    text-transform: uppercase;
    font-weight: 500;
    outline: none;
    transition: .5s;
}

.sticky-top.navbar-dark .navbar-nav .nav-link {
    padding: 20px 0;
}

.navbar-dark .navbar-nav .nav-link:hover,
.navbar-dark .navbar-nav .nav-link.active {
    color: var(--primary) !important;
}

.navbar-dark .navbar-brand img {
    max-height: 60px;
    transition: .5s;
}

.sticky-top.navbar-dark .navbar-brand img {
    max-height: 45px;
}

@media (max-width: 991.98px) {
    .sticky-top.navbar-dark {
        position: relative;
    }

    .navbar-dark .navbar-collapse {
        margin-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, .1)
    }

    .navbar-dark .navbar-nav .nav-link,
    .sticky-top.navbar-dark .navbar-nav .nav-link {
        padding: 10px 0;
        margin-left: 0;
    }

    .navbar-dark .navbar-brand img {
        max-height: 45px;
    }
}

@media (min-width: 992px) {
    .navbar-dark {
        position: absolute;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: transparent !important;
    }
    
    .sticky-top.navbar-dark {
        position: fixed;
        background: var(--dark) !important;
    }
}


/*** Hero Header ***/
.hero-header {
    background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url(../img/bg-hero.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}

.hero-header img {
    animation: imgRotate 50s linear infinite;
}

@keyframes imgRotate { 
    100% { 
        transform: rotate(360deg); 
    } 
}

.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, .5);
}


/*** Section Title ***/
.section-title {
    position: relative;
    display: inline-block;
}

.section-title::before {
    position: absolute;
    content: "";
    width: 45px;
    height: 2px;
    top: 50%;
    left: -55px;
    margin-top: -1px;
    background: var(--primary);
}

.section-title::after {
    position: absolute;
    content: "";
    width: 45px;
    height: 2px;
    top: 50%;
    right: -55px;
    margin-top: -1px;
    background: var(--primary);
}

.section-title.text-start::before,
.section-title.text-end::after {
    display: none;
}


/*** Service ***/
.service-item {
    box-shadow: 0 0 45px rgba(0, 0, 0, .08);
    transition: .5s;
}

.service-item:hover {
    background: var(--primary);
}

.service-item * {
    transition: .5s;
}

.service-item:hover * {
    color: var(--light) !important;
}


/*** Food Menu ***/
.nav-pills .nav-item .active {
    border-bottom: 2px solid var(--primary);
}


/*** Youtube Video ***/
.video {
    position: relative;
    height: 100%;
    min-height: 500px;
    background: linear-gradient(rgba(15, 23, 43, .1), rgba(15, 23, 43, .1)), url(../img/video.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}

.video .btn-play {
    position: absolute;
    z-index: 3;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    box-sizing: content-box;
    display: block;
    width: 32px;
    height: 44px;
    border-radius: 50%;
    border: none;
    outline: none;
    padding: 18px 20px 18px 28px;
}

.video .btn-play:before {
    content: "";
    position: absolute;
    z-index: 0;
    left: 50%;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    display: block;
    width: 100px;
    height: 100px;
    background: var(--primary);
    border-radius: 50%;
    animation: pulse-border 1500ms ease-out infinite;
}

.video .btn-play:after {
    content: "";
    position: absolute;
    z-index: 1;
    left: 50%;
    top: 50%;
    transform: translateX(-50%) translateY(-50%);
    display: block;
    width: 100px;
    height: 100px;
    background: var(--primary);
    border-radius: 50%;
    transition: all 200ms;
}

.video .btn-play img {
    position: relative;
    z-index: 3;
    max-width: 100%;
    width: auto;
    height: auto;
}

.video .btn-play span {
    display: block;
    position: relative;
    z-index: 3;
    width: 0;
    height: 0;
    border-left: 32px solid var(--dark);
    border-top: 22px solid transparent;
    border-bottom: 22px solid transparent;
}

@keyframes pulse-border {
    0% {
        transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
        opacity: 1;
    }

    100% {
        transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
        opacity: 0;
    }
}

#videoModal {
    z-index: 99999;
}

#videoModal .modal-dialog {
    position: relative;
    max-width: 800px;
    margin: 60px auto 0 auto;
}

#videoModal .modal-body {
    position: relative;
    padding: 0px;
}

#videoModal .close {
    position: absolute;
    width: 30px;
    height: 30px;
    right: 0px;
    top: -30px;
    z-index: 999;
    font-size: 30px;
    font-weight: normal;
    color: #FFFFFF;
    background: #000000;
    opacity: 1;
}


/*** Team ***/
.team-item {
    box-shadow: 0 0 45px rgba(0, 0, 0, .08);
    height: calc(100% - 38px);
    transition: .5s;
}

.team-item img {
    transition: .5s;
}

.team-item:hover img {
    transform: scale(1.1);
}

.team-item:hover {
    height: 100%;
}

.team-item .btn {
    border-radius: 38px 38px 0 0;
}


/*** Testimonial ***/
.testimonial-carousel .owl-item .testimonial-item,
.testimonial-carousel .owl-item.center .testimonial-item * {
    transition: .5s;
}

.testimonial-carousel .owl-item.center .testimonial-item {
    background: var(--primary) !important;
    border-color: var(--primary) !important;
}

.testimonial-carousel .owl-item.center .testimonial-item * {
    color: var(--light) !important;
}

.testimonial-carousel .owl-dots {
    margin-top: 24px;
    display: flex;
    align-items: flex-end;
    justify-content: center;
}

.testimonial-carousel .owl-dot {
    position: relative;
    display: inline-block;
    margin: 0 5px;
    width: 15px;
    height: 15px;
    border: 1px solid #CCCCCC;
    border-radius: 15px;
    transition: .5s;
}

.testimonial-carousel .owl-dot.active {
    background: var(--primary);
    border-color: var(--primary);
}


/*** Footer ***/
.footer .btn.btn-social {
    margin-right: 5px;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--light);
    border: 1px solid #FFFFFF;
    border-radius: 35px;
    transition: .3s;
}

.footer .btn.btn-social:hover {
    color: var(--primary);
}

.footer .btn.btn-link {
    display: block;
    margin-bottom: 5px;
    padding: 0;
    text-align: left;
    color: #FFFFFF;
    font-size: 15px;
    font-weight: normal;
    text-transform: capitalize;
    transition: .3s;
}

.footer .btn.btn-link::before {
    position: relative;
    content: "\f105";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 10px;
}

.footer .btn.btn-link:hover {
    letter-spacing: 1px;
    box-shadow: none;
}

.footer .copyright {
    padding: 25px 0;
    font-size: 15px;
    border-top: 1px solid rgba(256, 256, 256, .1);
}

.footer .copyright a {
    color: var(--light);
}

.footer .footer-menu a {
    margin-right: 15px;
    padding-right: 15px;
    border-right: 1px solid rgba(255, 255, 255, .1);
}

.footer .footer-menu a:last-child {
    margin-right: 0;
    padding-right: 0;
    border-right: none;
}
<!--  -->

/*  */
.btn-add{
    color: var(--dark) !important;
 background:none;
    font-size: 16px !important;
    /* border: 3px; */
}
.btn-add:hover{
    color: var(--primary);
}
.quantite input[type=text]{
    text-align:center;
    width: 50px !important;
    height: 30px !important;
    
}
.form-submit input[type=number]{
    text-align:center;
    width: 70px !important;
    height: 30px !important;
    background: none !important;
    border: none !important;
}
.plus-minus-input{
margin-left: 0% !important;
margin-top: 0px !important;
}

.shopping-bag{
    cursur:pointer;
    color: var(--dark) !important;
     font-size: 30px !important;
    background:none;
    border: none;
}
.shopping-bag:hover{
    color: #FEA116 !important;
}
.btn-warning:focus{
    border: none !important;
}

.text-primary-price{
 left: 0 !important;
}
.span span{
    margin-left: -50px !important;
}
.d-grid{
    margin-left: 45% !important;
}

.btn-warning{
    background: none !important;
    border: none !important;
}
.btn-input{
    width: 30px !important;
    height: 30px !important;
    position: relative;
     justify-content: center;
    align-items: center;
    text-align:center;
    font-size: 1.5rem;
    color: #fff !important;
    background: #c2c2c2 !important;
}
.btn-input:hover{
    cursor: pointer;
    user-select: none !important;
    }
.noFocus:focus{
    outline: 0;
  
}
.noFocus{
    border: 1px solid #c2c2c2;
    text-align: center;
    user-select: none !important;
}

<!-- le bouton plus et moins -->
<!-- .fa-trash{
    background: #FEA116 !important;
} -->
.fa-sync-alt{
    background: none !important;
    border: none !important;
}
.fa-trash{
    width: 35px !important;
    hieght: 80px !important;
    color: #FEA116 !important;
    border: 2px solid var(--dark) !important;
    padding: 5px !important;
}

.fa-trash:hover{
    color: #e74c3c !important;
}
.btn-warning-order{
    color: #212529;
  background-color: #FFC100;
  border-color: #FFC100;
}
.text-info{
    color: var(--dark) !important;
}
.btn-info{
    color: #fff;
    background-color: var(--dark) !important;
    border:none;
}
.btn-info:hover{
    color: #FEA116;
    <!-- background-color: var(--dark) !important; -->

}
.vider{
     color: #e74c3c;
     font-size: 1.2rem;
}
.vider:hover{
     color: var(--dark) !important;
}
.d-action{
   display: flex;
   justify-content: space-between;
     padding: 12px 30px 12px 30px !important;

}
.menu-table {
            display: grid;
            grid-template-columns: repeat(auto-fit, 30rem);
            gap:1.5rem;
            align-items: flex-start;
            justify-content: center;
           
}
.event-table {
            display: grid;
            grid-template-columns: repeat(auto-fit, 30rem);
            gap:1.5rem;
            align-items: flex-start;
            justify-content: center;
           
}
.event-table table{
  box-shadow: .5rem .5rem .5rem .5rem rgba(0,0,0,.1);
}
.col-sm-6 .type{
    margin-left: 250px !important;
}
.event-table table .E-time
{
    font-style: italic;
}
.event-table table td
{
    padding: 5px;
}
.fa-arrow-up,
.fa-arrow-down{
color: var(--bs-primary);
}