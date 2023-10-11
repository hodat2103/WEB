<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<style>
    .scrollable-container {
    height: 5000px;
    overflow: auto;
}
.slideshow {
width: 100%;
height: 500px;
position: relative;
overflow: hidden;
}

.slideshow img {
width: 100%;
height: 100%;
position: absolute;
top: 0;
left: 0;
opacity: 0;
transition: opacity 1s ease-in-out;
}

.slideshow img.active {
opacity: 1;
}



.group-child {
    position: absolute;
    top: 0;
    left: 0;
    border-radius: var(--br-xl);
    background-color: var(--color-gray);
    width: 1162px;
    height: 300px;
  }
  
  .rectangle-div {
    position: absolute;
    top: 240px;
    left: 919px;
    background-color: var(--color-maroon);
    width: 225px;
    height: 52px;
  }
  
  .rectangle-parent {
    top: -100px;
    margin-left: 150px;
    position: relative;
    width: 100%;
    height: 300px;
    text-align: center;
    font-size: var(--font-size-base);
    color: var(--color-white);
    font-family: var(--font-times-new-roman);
  }
  .group-text{
    margin-left: 80px;
    display:flex;
    gap: 40px 50px;
    width: 900px;
    padding: 10px;
  }
  /*  content */
  .containerr-content{
    margin-left: 175px;
    text-align: center;
    margin-top: 750px;
    width: 785px;
    height: 1000px;
    background-color: lightblue;
    display: grid;
    gap: 50px 50px;
    overflow: auto;
  }
  .coupon{
    padding: 10px;
   gap: 10px 10px;
    display: flex;
    position: relative;
    width: 600px;
    height: 230px;
    background-image: url(./picture/background\ voucher.jpg);
    background-size: 100%;
   margin-left: 50px;
   border-radius: 20px;

   border: 1px solid #000000;
  }
  .anhdong{
    
    width: 180px;
    height:150px;
    border-radius: 20px;
    
    overflow: hidden;
    cursor: pointer;
    
    
    }
    
    .anhdong img{
        
    width: 100%;
    height: 100%;
    filter: grayscale(.4);
    transition: .3s;
   
    
    }
    
    .anhdong img:hover{
    filter: grayscale(0);
    transform: scale(1.3) rotate(7deg);
    
    }


    .noidung{
        padding: 20px;
        width: 300px;
        height: 300px;
        font-family: cursive;
    }

    /*                   */



    .tour-sale{
      margin-top: -1000px;
      margin-left: 980px;
      text-align: center;
      background-color: bisque;
      width: 300px;
      height: 300px;
      overflow: auto;
    }

    

</style>
<body>
    
</body>
</html>