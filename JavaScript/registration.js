function Register_Confirm()
{
  var flag=true;

  var input_obj=document.getElementsByTagName('input');

  // First name Validation
  if(!/^[a-zA-Z]+$/.test(input_obj[0].value))
  {
    flag=false;
    input_obj[0].style.border="2px solid red";
  }
  else {
    input_obj[0].style.border="2px solid black";
  }

//Last Name Validation
  if(!/^[a-zA-Z]+$/.test(input_obj[2].value))
  {
    flag=false;
    input_obj[2].style.border="2px solid red";
  }
  else {
    input_obj[2].style.border="2px solid black";
  }

//Contact Number Validation
  if(!/^[0-9]{10}$/.test(input_obj[3].value))
  {
    flag=false;
    input_obj[3].style.border="2px solid red";
  }
  else {
    input_obj[3].style.border="2px solid black";
  }

//Email validation
  if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(input_obj[4].value))
  {
    flag=false;
    input_obj[4].style.border="2px solid red";
  }
  else
  {
    input_obj[4].style.border="none";
  }

  //Password Validation

  if(input_obj[5].value != input_obj[6].value)
  {
    flag=false;
    input_obj[5].style.border="2px solid red";
    input_obj[6].style.border="2px solid red";
  }
  else
  {
    input_obj[5].style.border="none";
    input_obj[6].style.border="none";
  }

  if(flag == false)
  {
    document.getElementById("message").innerHTML="Please Check Mandatory Feilds Properly";
    document.getElementById("message").removeAttribute("hidden");
    return false;
  }
  else
  {
    document.getElementById("message").innerHTML="none";
    document.getElementById("message").setAttribute("hidden");
    return true;
  }
}
