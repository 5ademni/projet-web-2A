<?php
header('Content-type: text/css; charset:UTF-8');
?>
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 150px !important;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 2em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png) !important;
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: left;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
  line-height: 20px !important;
}

#company {
  float: right;
  text-align: left;
  line-height: 20px !important;
}

#project div,
#company div {
  white-space: nowrap;        
}
#company .nom{
  letter-spacing: 1px;
  font-size: 16px;
  font-weight: bold;
  color: #eaa001 !important;
  
}
table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: center;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

#footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
.stotal1{
  width:200% !important;
  display: flex;
  float: left;
  justify-content: flex-end;
  <!-- padding-left:100px; -->
  justify-content: space-between;
  <!-- flex-direction: row; -->
}