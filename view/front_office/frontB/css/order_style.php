<?php
header('Content-type: text/css; charset:UTF-8');
?>
:root{
   --main-color:#2980b9;
   --orange:#f39c12;
   --red:#e74c3c;
   --black:#444;
   --white:#fff;
   --light-color:#777;
   --light-bg:#f5f5f5;
   --border:.1rem solid rgba(0,0,0,.1);
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
}

.orders .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 30rem);
   gap:1.5rem;
   align-items: flex-start;
   justify-content: center;
}
.orders .box-container-2{
   display: grid;
   grid-template-columns: repeat(auto-fit, 20rem);
   gap:1.5rem;
   align-items: flex-start;
   justify-content: center;
}
.orders .box-container-2 .box,
.orders .box-container .box{
   padding:2rem;
   padding-top: 1rem;
   border-radius: .5rem;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
}
.orders .box-container-2 .box p,
.orders .box-container .box p{
   line-height: 1.5;
   font-size: 1rem;
   color:var(--light-color);
   margin:1rem 0;
}
.orders .box-container-2 .box p span,
.orders .box-container .box p span{
   color:var(--main-color);
}


.orders{
   <!-- font-family: 'Nunito', sans-serif; -->
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
     font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-size: 1rem;
  font-weight: 400;
}
.orders .box-container .select{
   margin-bottom: .5rem;
   width: 30%;
   background-color: var(--light-bg);
   padding:.5rem;
   font-size: 1rem;
   color:var(--black);
   border-radius: .5rem;
   <!-- border:var(--border); -->
}

.accounts .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   align-items: flex-start;
   justify-content: center;
}

.accounts .box-container .box{
   padding:2rem;
   padding-top: .5rem;
   border-radius: .5rem;
   text-align: center;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
}

.accounts .box-container .box p{
   font-size: 2rem;
   color:var(--light-color);
   margin: 1rem 0;
}

.accounts .box-container .box p span{
   color:var(--main-color);
}

.contacts .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   align-items: flex-start;
   justify-content: center;
}


.contacts .box-container .box{
   padding:2rem;
   padding-top: 1rem;
   border-radius: .5rem;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
}

.contacts .box-container .box p{
   line-height: 1.5;
   font-size: 2rem;
   color:var(--light-color);
   margin:1rem 0;
}

.contacts .box-container .box p span{
   color:var(--main-color);
}








.option-btn{
    color: #fff;
   background-color: var(--main-color);
   padding:.2rem;
     border-radius: 4px !important;
}

.delete-btn{
   color: #fff;
   background-color: var(--red);
   padding:.2rem;
     border-radius: 4px !important;
}
.box-h,
.flex-btn{
   display: flex;
   gap:1rem;
}
.flex-btn input[type=submit]{
   border: none;
}

.flex-btn a:hover{
   text-decoration: none;
}
.b-search{
   justify-content: center;
align-items: center;
text-align: center;

margin-left: 300px !important;
}
.b-search input[type=submit]{
   position : relative;
width: 100% !important;
<!-- padding: 100px; -->
}






@media (max-width:991px){

   html{
      font-size: 55%;
   }

}

@media (max-width:768px){

   #menu-btn{
      display: inline-block;
   }

   .header .flex .navbar{
      position: absolute;
      top:99%; left:0; right:0;
      border-top: var(--border);
      border-bottom: var(--border);
      background-color: var(--white);
      transition: .2s linear;
      clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
   }

   .header .flex .navbar.active{
      clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
   }

   .header .flex .navbar a{
      display: block;
      margin:2rem;
   }

}
.heading{
   font-size: 2rem;
   color:var(--black);
   margin-bottom: 2rem;
   text-align: center;
   text-transform: uppercase;
}

@media (max-width:450px){

   html{
      font-size: 50%;
   }

   .heading{
      font-size: 3.5rem;
   }

   .flex-btn{
      flex-flow: column;
      gap:0;
   }

   .add-products form textarea{
      height:15rem;
   }   

   .show-products .box-container{
      grid-template-columns: 1fr;
   }

   .orders .box-container{
      grid-template-columns: 1fr;
   }

   .accounts .box-container{
      grid-template-columns: 1fr;
   }

   .contacts .box-container{
      grid-template-columns: 1fr;
   }

}