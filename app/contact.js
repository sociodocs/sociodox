const val_con = document.getElementById('contact-form-submit');

val_con.addEventListener('submit', (e) => {

    var cfname  = document.getElementById('cfname');
    var clname  = document.getElementById('clname');
    var cemail  = document.getElementById('cemail');
    var cmobile = document.getElementById('cmobile');

    var cfn_span = document.getElementById('cfn-span');
    var cln_span = document.getElementById('cln-span');
    var cem_span = document.getElementById('cem-span');
    var cmb_span = document.getElementById('cmb-span');

    if(!ValidateName(cfname)){
        
        cfn_span.innerHTML = "First Name is Invalid";
        cfn_span.style.color = "red";
        e.preventDefault();
    }else{

        cfn_span.innerHTML = "First Name";
        cfn_span.style.color = "#000";
    }
    
    if(!ValidateName(clname)){
        
        cln_span.innerHTML = "Last Name is Invalid";
        cln_span.style.color = "red";
        e.preventDefault();
    }else{

        cln_span.innerHTML = "Last Name";
        cln_span.style.color = "#000";
    }

    if(!ValidateEmail(cemail)){

        cem_span.innerHTML = "Email is Invalid";
        cem_span.style.color = "red";
        e.preventDefault();
    }else{

        cem_span.innerHTML = "Email Address";
        cem_span.style.color = "#000";
    }

    if(!ValidateMobile(cmobile)){

        cmb_span.innerHTML = "Mobile is Invalid";
        cmb_span.style.color = "red";
        e.preventDefault();
    }else{
        
        cmb_span.innerHTML = "Mobile Number";
        cmb_span.style.color = "#000";
    }
});