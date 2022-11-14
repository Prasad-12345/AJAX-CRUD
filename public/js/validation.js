$.validator.addMethod("validfirstName",function(value) {
    return /^[A-Z]{1}[A-Za-z]{20}$/.test(value);
},'please enter a valid first name name');

$.validator.addMethod("validlastName",function(value) {
    return /^[A-Z]{1}[A-Za-z]{20}$/.test(value);
},'please enter a valid last name');

$.validator.addMethod("validcity",function(value) {
    return /^[A-Z]{1}[A-Za-z]{20}$/.test(value);
},'please enter a valid city');

$.validator.addMethod("validstate",function(value) {
    return /^[A-Z]{1}[A-Za-z]{20}$/.test(value);
},'please enter a valid state');

$.validator.addMethod("validEmail", function(value) {
    return /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
},'Please enter valid email');

$.validator.addMethod("validpassword", function(value) {
    return /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/.test(value);
},'Please enter valid Phone');

// $.validator.addMethod("validid",function(value) {
//     return /^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{2}$/.test(value);
// },'please enter a valid company name');