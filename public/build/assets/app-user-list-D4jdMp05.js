$(function(){let i,c,d;isDarkStyle?(i=config.colors_dark.borderColor,c=config.colors_dark.bodyBg,d=config.colors_dark.headingColor):(i=config.colors.borderColor,c=config.colors.bodyBg,d=config.colors.headingColor);var u=$(".datatables-users"),m=$(".select2"),p=$(".select3"),f=$(".select4"),g=$(".select5"),v=baseUrl+"app/user/view/account";if(m.length){var r=m;r.wrap('<div class="position-relative"></div>').select2({placeholder:"Select Status",dropdownParent:r.parent()})}if(p.length){var r=p;r.wrap('<div class="position-relative"></div>').select2({placeholder:"Select Role Structure",dropdownParent:r.parent()})}if(f.length){var r=f;r.wrap('<div class="position-relative"></div>').select2({placeholder:"Select Role Access",dropdownParent:r.parent()})}if(g.length){var r=g;r.wrap('<div class="position-relative"></div>').select2({placeholder:"Select Role",dropdownParent:r.parent()})}if(u.length)var h=u.DataTable({ajax:"users/list",columns:[{data:"no"},{data:"nik"},{data:"nama"},{data:"email"},{data:"rs_nama"},{data:"ra_nama"},{data:"role_nama"},{data:"no_tlp"},{data:"status"},{data:"action"}],columnDefs:[{targets:8,render:function(a,o,t,n){var e=t.status,l="";return e=="ACTIVE"&&(l='<span class="badge bg-label-success">'+e+"</span>"),e=="INACTIVE"&&(l='<span class="badge bg-label-warning">'+e+"</span>"),e=="SUSPENDED"&&(l='<span class="badge bg-label-danger">'+e+"</span>"),l}},{targets:9,title:"Actions",searchable:!1,orderable:!1,render:function(a,o,t,n){return`<div class="d-flex align-items-center"><a href="javascript:;" class="text-body" onclick="OpenModalEditUsers('`+t.id+"', '"+t.nik+"', '"+t.nama+"', '"+t.email+"', '"+t.no_tlp+"', '"+t.role_structure+"', '"+t.role_access+"', '"+t.role+"', '"+t.status+"', '"+t.alamat+`')"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record" data-id="`+t.id+'"><i class="ti ti-trash ti-sm mx-2"></i></a><a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="'+v+'" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Reset Password</a></div></div>'}}],dom:'<"row me-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Search.."},buttons:[{extend:"collection",className:"btn btn-label-secondary dropdown-toggle mx-3 waves-effect waves-light",text:'<i class="ti ti-screen-share me-1 ti-xs"></i>Export',buttons:[{extend:"print",text:'<i class="ti ti-printer me-2" ></i>Print',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(a,o,t){if(a.length<=0)return a;var n=$.parseHTML(a),e="";return $.each(n,function(l,s){s.classList!==void 0&&s.classList.contains("user-name")?e=e+s.lastChild.firstChild.textContent:s.innerText===void 0?e=e+s.textContent:e=e+s.innerText}),e}}},customize:function(a){$(a.document.body).css("color",d).css("border-color",i).css("background-color",c),$(a.document.body).find("table").addClass("compact").css("color","inherit").css("border-color","inherit").css("background-color","inherit")}},{extend:"csv",text:'<i class="ti ti-file-text me-2" ></i>Csv',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(a,o,t){if(a.length<=0)return a;var n=$.parseHTML(a),e="";return $.each(n,function(l,s){s.classList!==void 0&&s.classList.contains("user-name")?e=e+s.lastChild.firstChild.textContent:s.innerText===void 0?e=e+s.textContent:e=e+s.innerText}),e}}}},{extend:"excel",text:'<i class="ti ti-file-spreadsheet me-2"></i>Excel',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(a,o,t){if(a.length<=0)return a;var n=$.parseHTML(a),e="";return $.each(n,function(l,s){s.classList!==void 0&&s.classList.contains("user-name")?e=e+s.lastChild.firstChild.textContent:s.innerText===void 0?e=e+s.textContent:e=e+s.innerText}),e}}}},{extend:"pdf",text:'<i class="ti ti-file-code-2 me-2"></i>Pdf',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(a,o,t){if(a.length<=0)return a;var n=$.parseHTML(a),e="";return $.each(n,function(l,s){s.classList!==void 0&&s.classList.contains("user-name")?e=e+s.lastChild.firstChild.textContent:s.innerText===void 0?e=e+s.textContent:e=e+s.innerText}),e}}}},{extend:"copy",text:'<i class="ti ti-copy me-2" ></i>Copy',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(a,o,t){if(a.length<=0)return a;var n=$.parseHTML(a),e="";return $.each(n,function(l,s){s.classList!==void 0&&s.classList.contains("user-name")?e=e+s.lastChild.firstChild.textContent:s.innerText===void 0?e=e+s.textContent:e=e+s.innerText}),e}}}}]},{text:'<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New User</span>',className:"add-new btn btn-primary waves-effect waves-light",attr:{"data-bs-toggle":"modal","data-bs-target":"#openModalAddUsers"}}],initComplete:function(){this.api().columns(4).every(function(){var a=this,o=$('<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role Structure </option></select>').appendTo(".user_role").on("change",function(){var t=$.fn.dataTable.util.escapeRegex($(this).val());a.search(t?"^"+t+"$":"",!0,!1).draw()});a.data().unique().sort().each(function(t,n){o.append('<option value="'+t+'">'+t+"</option>")})}),this.api().columns(5).every(function(){var a=this,o=$('<select id="UserPlan" class="form-select text-capitalize"><option value=""> Select Role Access </option></select>').appendTo(".user_plan").on("change",function(){var t=$.fn.dataTable.util.escapeRegex($(this).val());a.search(t?"^"+t+"$":"",!0,!1).draw()});a.data().unique().sort().each(function(t,n){o.append('<option value="'+t+'">'+t+"</option>")})}),this.api().columns(8).every(function(){var a=this,o=$('<select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Status </option></select>').appendTo(".user_status").on("change",function(){var t=$.fn.dataTable.util.escapeRegex($(this).val());a.search(t?"^"+t+"$":"",!0,!1).draw()});a.data().unique().sort().each(function(t,n){o.append('<option value="'+t+'">'+t+"</option>")})})}});$(".datatables-users tbody").on("click",".delete-record",function(){var a=$(this).data("id");Swal.fire({title:"Are you sure?",text:"You won't be able to revert user!",icon:"warning",showCancelButton:!0,confirmButtonText:"Yes, delete user!",customClass:{confirmButton:"btn btn-primary me-2 waves-effect waves-light",cancelButton:"btn btn-label-secondary waves-effect waves-light"},buttonsStyling:!1}).then(function(o){o.value?$.ajax({type:"GET",dataType:"json",url:"/users/deleteProses/"+a,success:function(t){t.success==!0&&(h.row($(this).parents("tr")).remove().draw(),Swal.fire({width:400,padding:7,position:"bottom-right",toast:!0,icon:"success",title:"Success",text:`${t.message}`,showConfirmButton:!1,timer:3e3,timerProgressBar:!0,backgroundColor:"#28a745",titleColor:"#fff"}),$(".datatables-users").DataTable().ajax.reload())}}):o.dismiss===Swal.DismissReason.cancel&&Swal.fire({title:"Cancelled",text:"Cancelled Deleted :)",icon:"error",customClass:{confirmButton:"btn btn-success waves-effect waves-light"}})})}),setTimeout(()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")},300)});(function(){addNewUserForm=document.getElementById("addNewUserForm"),FormValidation.formValidation(addNewUserForm,{fields:{nama:{validators:{notEmpty:{message:"Please enter fullname"}}},nik:{validators:{notEmpty:{message:"Please enter nik"}}},status:{validators:{notEmpty:{message:"Please enter status"}}},alamat:{validators:{notEmpty:{message:"Please enter Alamat"}}},password:{validators:{notEmpty:{message:"Please enter password"},stringLength:{min:4,message:"Password must be more than 4 characters"}}},no:{validators:{notEmpty:{message:"Please enter Contact"},stringLength:{min:11,message:"Contact must be more than 11 characters"}}},email:{validators:{notEmpty:{message:"Please enter your email"},emailAddress:{message:"The value is not a valid email address"}}},role_structure:{validators:{notEmpty:{message:"Please enter Role Structure"}}},role_access:{validators:{notEmpty:{message:"Please enter Role Access"}}},role:{validators:{notEmpty:{message:"Please enter Role"}}},image:{validators:{notEmpty:{message:"Please enter Image"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({eleValidClass:"",rowSelector:function(i,c){return".mb-3"}}),submitButton:new FormValidation.plugins.SubmitButton,autoFocus:new FormValidation.plugins.AutoFocus}})})();