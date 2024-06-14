const a=document.querySelector("#formAuthentication");document.addEventListener("DOMContentLoaded",function(n){(function(){a&&FormValidation.formValidation(a,{fields:{nik:{validators:{notEmpty:{message:"Please enter nik"}}},name:{validators:{notEmpty:{message:"Please enter name"}}},role_structure:{validators:{notEmpty:{message:"Please enter Role Structure"},stringLength:{message:"Role Structure must be more than 6 characters"}}},image:{validators:{notEmpty:{message:"Please enter image"},stringLength:{message:"image must be more than 6 characters"}}},kontak:{validators:{notEmpty:{message:"Please enter kontak"},stringLength:{min:10,message:"kontak must be more than 6 characters"}}},alamat:{validators:{notEmpty:{message:"Please enter alamat"},stringLength:{min:5,message:"alamat must be more than 6 characters"}}},email:{validators:{notEmpty:{message:"Please enter your email"},emailAddress:{message:"Please enter valid email address"}}},"email-username":{validators:{notEmpty:{message:"Please enter email / username"},stringLength:{min:6,message:"Username must be more than 6 characters"}}},password:{validators:{notEmpty:{message:"Please enter your password"},stringLength:{min:6,message:"Password must be more than 6 characters"}}},"confirm-password":{validators:{notEmpty:{message:"Please confirm password"},identical:{compare:function(){return a.querySelector('[name="password"]').value},message:"The password and its confirm are not the same"},stringLength:{min:6,message:"Password must be more than 6 characters"}}},terms:{validators:{notEmpty:{message:"Please agree terms & conditions"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({eleValidClass:"",rowSelector:".mb-3"}),submitButton:new FormValidation.plugins.SubmitButton,defaultSubmit:new FormValidation.plugins.DefaultSubmit,autoFocus:new FormValidation.plugins.AutoFocus},init:e=>{e.on("plugins.message.placed",function(t){t.element.parentElement.classList.contains("input-group")&&t.element.parentElement.insertAdjacentElement("afterend",t.messageElement)})}});const s=document.querySelectorAll(".numeral-mask");s.length&&s.forEach(e=>{new Cleave(e,{numeral:!0})})})()});
