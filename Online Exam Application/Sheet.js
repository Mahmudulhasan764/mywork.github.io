
function validateform(){
    var name = document.getElementById("name").value;
    var surname = document.getElementById("surname").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var error_message = document.getElementById("error_message");
    
    error_message.style.padding = "10px";
    
    var text;
    if(name.length <=1){
      text = "Please Enter valid Name more than one letter";
      error_message.innerHTML = text;
      return false;
    }
    if(surname.length <= 1){
      text = "Please Enter Correct Surname";
      error_message.innerHTML = text;
      return false;
    }
    if(isNaN(phone) || phone.length <=1){
      text = "Please Enter valid Phone Number";
      error_message.innerHTML = text;
      return false;
    }
    if(email.length <=1){
      text = "Please Enter valid Email";
      error_message.innerHTML = text;
      return false;
    }
    if(message.length <= 1){
      text = "Please Fill the Message's part";
      error_message.innerHTML = text;
      return false;
    }
    alert("Form Submitted Successfully!");
    return true;
  }

// online shoping calculation

function totalCal() {


    let main01;
    let Select01;
    let Val01;
    let count01=0;
    Proper01 = document.getElementById("Proper01");

    let main02;
    let Select02;
    let Val02;
    let count02=0;
    proper2 = document.getElementById("proper2");

    let main03;
    let Select03;
    let Val03;
    let count03=0;
    Proper03 = document.getElementById("Proper03");

    let main04;
    let Select04;
    let Val04;
    let count04=0;


    let main020;
    let Value02; 
    let counter02 = 0;
    let selection2;
    Proper04 = document.getElementById("Proper04");

   
   
   
   
   
   
    

  
    
        
   
    
    
         
   
         
     
          main01 = document.getElementById("main0-1");
          main02= document.getElementById("main0-2");
          main03 = document.getElementById("main0-3");
          main04 = document.getElementById("main0-4");

          
          main210 = document.getElementById("main210");
          main220= document.getElementById("main220");
          main230 = document.getElementById("main230");
          main240 = document.getElementById("main240");

     
     
    if (Proper01.checked == true) {
        document.getElementById("Amount1").disabled = false;

        if (main01.checked == true) {
           main01 = parseInt(main01.value);
        } else if (main02.checked == true) {
            main01= parseInt(main02.value);
        } else if (main03.checked == true) {
            main01 = parseInt(main03.value);
        } else if (main04.checked == true) {
            main01 = parseInt(main04.value);
        }
        Select01= document.getElementById("Select01");
        Val01= parseInt(Select01.options[Select01.selectedIndex].value);
        count01 = main01 *Val01;
        document.getElementById("Amount1").value = "$ " + count01;
    }
    if (proper2.checked == true) {
        document.getElementById("Amount02").disabled = false;

        if (main210.checked == true) {
            main020 = parseInt(main210.value);
        } else if (main220.checked == true) {
            main020 = parseInt(main220.value);
        } else if (main230.checked == true) {
            main020= parseInt(main230.value);
        } else if (main240.checked == true) {
            main020 = parseInt(main240.value);
        }
        selection2 = document.getElementById("selection2");
        Value02 = parseInt(selection2.options[selection2.selectedIndex].value);
        counter02 =  main020 * Value02;
        document.getElementById("Amount02").value = "$ " +counter02;
   
    }
    if (Proper03.checked == true) {
        document.getElementById("Amount3").disabled = false;

        if (main31.checked == true) {
            main03 = parseInt( main31.value);
        } else if (main32.checked == true) {
            main03 = parseInt(main32.value);
        } else if (main33.checked == true) {
            main03 = parseInt( main33.value);
        } else if (main34.checked == true) {
            main03= parseInt(main34.value);
        }
        Select03 = document.getElementById("Select03");
        Val03= parseInt(Select03.options[Select03.selectedIndex].value);
        count03 = main03 *  Val03;
        document.getElementById("Amount3").value = "$ " + count03 ;
    }
    if (Proper04.checked == true) {
        document.getElementById("Amount4").disabled = false;

        if (main41.checked == true) {
            main04  = parseInt(main41.value);
        } else if (main42.checked == true) {
            main04  = parseInt(main42.value);
        } else if (main43.checked == true) {
            main04  = parseInt(main43.value);
        } else if (main44.checked == true) {
            main04  = parseInt(main44.value);
        }
        Select04 = document.getElementById("Select04");
        Val04= parseInt(Select04.options[Select04.selectedIndex].value);
        count04 = main04 *  Val04;
        document.getElementById("Amount4").value = "$ " + count04;
    }
    let totAmount;
    totAmount = count01 +counter02+  count03 +count04;
    if (totAmount >= 200) {

        totAmount= totAmount-totAmount * 0.15;
        document.getElementById("totAmount").innerHTML = "$ " + totAmount;
    
       
       
    } 
else{
    totAmount= totAmount+totAmount * 0.15;
    document.getElementById("totAmount").innerHTML = "$ " + totAmount;
  
}
let conf=confirm("Are you ready to pay: "+totAmount+"$" );
if(conf==true){
    alert("Thank you");
}else{
    alert("Your application is withdrawed ");
   location.reload();
}

  
   
}


// contact us validation


