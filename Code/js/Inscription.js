function validate(){
            			
                    var emailID = document.forms["myForm"]["email"].value;
                    atpos = emailID.indexOf("@");
                    dotpos = emailID.lastIndexOf(".");
                        if (atpos < 1 || ( dotpos - atpos < 2 )) {
                        alert("Entrez un e-mail correct s'il-vous-plait");
                        document.myForm.email.focus() ;
                        Console.log(false);
                        return false;
						}
						alert("e-mail correct");
											
          
                    var x = document.forms["myForm"]["mdp"].value;
                    var y = document.forms["myForm"]["cmdp"].value;
                        if (x != y) {
                        alert("Les deux mots de passe sont différents");
                        document.myForm.mdp.focus();
                        return false;
						}
                        continue;
}