<?php
header('Content-type: text/css; charset:UTF-8');
?>
body {
    font-family: Arial;
    font-size: 15px;
    padding: 8px;
    font-family: 'Nunito', sans-serif;
}

:root {
    --primary: #FEA116;
    --light: #F1F8FF;
    --dark: #0F172B;
}

* {
    box-sizing: border-box;
}
a{
    text-decoration: none;
   text-transform: none;
   background: orange;
   border-radius: 50%;
   padding: 10px !important;
}
#title{
    font-size: 25px;
    padding: auto;
    width: 74.5%;
    text-align: center;
     color: #49615d;
    background: #FEA116;

}

.row {
    display: -ms-flexbox;
    /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap;
    /* IE10 */
    flex-wrap: wrap;
    margin: 0 -16px;
}

.col-25 {
    -ms-flex: 25%;
    /* IE10 */
    flex: 25%;
}

.col-50 {
    -ms-flex: 50%;
    /* IE10 */
    flex: 50%;
}

.col-75 {
    -ms-flex: 75%;
    /* IE10 */
    flex: 75%;
}

.col-25,
.col-50,
.col-75 {
    padding: 0 16px;
}

.container {
    background-color: #f2f2f2;
    padding: 5px 20px 15px 20px;
    border: 1px solid lightgrey;
    border-radius: 3px;
}

input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
}
input[type=submit] {
   font-size: 15px !important;
}

label {
    margin-bottom: 10px;
    display: block;
}

.icon-container {
    margin-bottom: 20px;
    padding: 7px 0;
    font-size: 24px;
}

.btn {
    background: #0F172B;
    color: #ccc;
    <!-- margin: 10px 0; -->
    border: none;
    width: 250px;
    margin-left: 400px !important;
    <!-- margin-top: -80px !important; -->
    text-align: center;
    justify-content: center;
    border-radius: 3px;
    cursor: pointer;
    <!-- /* margin: auto; */ -->
    <!-- padding: 5px !important; -->
    <!-- font-size: 30px !important; -->
}

.btn:hover {
    background: #FEA116;
    color: var(--dark);
}

a {
    color: #0F172B;
}

hr {
    border: 1px solid lightgrey;
}

span.price {
    float: right;
    color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
    .row {
        flex-direction: column-reverse;
    }

    .col-25 {
        margin-bottom: 20px;
    }
}


.moyen {
    display: row;
    <!-- justify-content: space-between; -->
    color: #0F172B;
    padding: 10px;
     <!-- margin-bottom: 2rem; -->
}

.moyen label {
    <!-- font-style: italic; -->
    font-size: 20px;
}
.moyen span{
    <!-- font-style: italic; -->
    margin: 10px;
}
input[type=checkbox] {
    font-size: 70px;
}
input{
    outline: none;
}
/* ===================================== */


#frmContact .field-row {
    margin-bottom: 20px;
}

div label {
    margin: 5px 0px 0px 5px;
    color: #49615d;
}

.demoInputBox {
    padding: 10px;
    border: #a5d2ca 1px solid;
    border-radius: 4px;
    background-color: #FFF;
    width: 100%;
    margin-top: 5px;
}

.demoSelectBox {
    padding: 10px;
    border: #a5d2ca 1px solid;
    border-radius: 4px;
    background-color: #FFF;
    margin-top: 5px;
}

select.demoSelectBox {
    height: 35px;
    margin-right: 10px;
}

.error {
    background-color: #FF6600;
    padding: 8px 10px;
    color: #FFFFFF;
    border-radius: 4px;
    font-size: 0.9em;
}

.success {
    background-color: #c3c791;
    padding: 8px 10px;
    color: #FFFFFF;
    border-radius: 4px;
    font-size: 0.9em;
}

.info {
    font-size: .8em;
    color: #FF6600;
    letter-spacing: 2px;
    padding-left: 5px;
}

.btnAction {
    background-color: #82a9a2;
    padding: 10px;
    font-size: .5rem;
    color: #FFF;
    border: #739690 1px solid;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
    <!-- letter-spacing: 0px; -->
}

.btnAction:focus {
    outline: none;
}

.column-right {
    margin-right: 6px;
}

.contact-row {
    display: inline-block;
}

.cvv-input{
    width: 60px;
}

#error-message {
    margin: 20px 0px 0px;
    background: #ffd6d6;
    padding: 10px;
    border-radius: 4px;
    line-height: 25px;
    font-size: 0.9em;
    color: #907575;
    display: none;
}
.lead{
    font-size: 1em;
}