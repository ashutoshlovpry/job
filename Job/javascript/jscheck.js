$( "#myform" ).validate({
          rules: {
            phone:{
                required:true,
                len2:true
            },
              date:{
                  required:true,
                  checkd:true
              }
          },
            messages:{
                phone:{
                    len2:"Please enter a valid phone number",
                    required:"Please enter a phone number"
                },
                date:{
                    checkd:"Please enter the date in format dd-mm-yyyy or dd/mm/yyyy"
                }
            }
});

function func(x)
    {
        b1= x.length==10;
        b2=false;
        temp=x[0]
        for(i=1;i<x.length;i++)
        {
            if(x[i]!=temp)
                {
                    b2=true;
                    break
                }
        }
        if(b1==true && b2==true)
            return true
        else return false
    }

function func2(x)
    {
        var upperCase= new RegExp('[A-Z]');
        var lowerCase= new RegExp('[a-z]');
        var numbers = new RegExp('[0-9]');
        var numbers2 = new RegExp('[!@#$%^&*()]');

        if(((x).match(upperCase) || (x).match(lowerCase)) &&  !(x).match(numbers) && !(x).match(numbers2))  
        {
            return true
        }
        else
            return false
    }

function func3(x)
    {
        var upperCase= new RegExp('[A-Z]');
        var lowerCase= new RegExp('[a-z]');
        var numbers = new RegExp('[0-9]');
        var numbers2 = new RegExp('[!@#$%^&*()]');

        if((x).match(upperCase) && (x).match(lowerCase) &&  (x).match(numbers) && (x).match(numbers2))  
        {
            return true
        }
        else
            return false
    }

function func4(x)
    {
        var regno= new RegExp('[0-9][0-9][a-zA-Z][a-zA-Z][a-zA-Z][0-9][0-9][0-9][0-9]');
        if((x).match(regno))  
        {
            return true
        }
        else
            return false
}

function func5(x)
    {
        var regno= /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/
        if((x).match(regno))  
        {
            return true
        }
        else
            return false
}


jQuery.validator.addMethod("length", function(value, element) {
 //Username check
    return func2(value);
});

jQuery.validator.addMethod("len2", function(value, element) {
  //phone check
  return func(value);
});
jQuery.validator.addMethod("checkp", function(value, element) {
  //check pass
  return func3(value);
});

jQuery.validator.addMethod("checkr", function(value, element) {
  //check registration num
  return func4(value);
});
jQuery.validator.addMethod("checkd", function(value, element) {
  //check registration num
  return func5(value);
});
