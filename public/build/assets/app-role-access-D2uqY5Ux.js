$(function(){let l,i,c;isDarkStyle?(l=config.colors_dark.borderColor,i=config.colors_dark.bodyBg,c=config.colors_dark.headingColor):(l=config.colors.borderColor,i=config.colors.bodyBg,c=config.colors.headingColor);var d=$(".datatables-role-access");if(d.length)var u=d.DataTable({ajax:"/setting/roleAccessList",columns:[{data:"no"},{data:"ra_nama"},{data:"ra_status"},{data:"ra_created_at"},{data:"action"}],columnDefs:[{targets:2,render:function(s,n,a,o){var e=a.ra_status,r="";return e=="ACTIVE"&&(r='<span class="badge bg-label-success">'+e+"</span>"),e=="INACTIVE"&&(r='<span class="badge bg-label-danger">'+e+"</span>"),r}},{targets:4,title:"Actions",searchable:!1,orderable:!1,render:function(s,n,a,o){return`<div class="d-flex align-items-center"><a href="javascript:;" class="text-body" onclick="OpenModalEditRoleAccess('`+a.ra_id+"', '"+a.ra_nama+"', '"+a.ra_status+`')"><i class="ti ti-edit ti-sm me-2"></i></a><a href="javascript:;" class="text-body delete-record" data-id="`+a.ra_id+'"><i class="ti ti-trash ti-sm mx-2"></i></a></div>'}}],dom:'<"row me-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Search.."},buttons:[{extend:"collection",className:"btn btn-label-secondary dropdown-toggle mx-3 waves-effect waves-light",text:'<i class="ti ti-screen-share me-1 ti-xs"></i>Export',buttons:[{extend:"print",text:'<i class="ti ti-printer me-2" ></i>Print',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(s,n,a){if(s.length<=0)return s;var o=$.parseHTML(s),e="";return $.each(o,function(r,t){t.classList!==void 0&&t.classList.contains("user-name")?e=e+t.lastChild.firstChild.textContent:t.innerText===void 0?e=e+t.textContent:e=e+t.innerText}),e}}},customize:function(s){$(s.document.body).css("color",c).css("border-color",l).css("background-color",i),$(s.document.body).find("table").addClass("compact").css("color","inherit").css("border-color","inherit").css("background-color","inherit")}},{extend:"csv",text:'<i class="ti ti-file-text me-2" ></i>Csv',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(s,n,a){if(s.length<=0)return s;var o=$.parseHTML(s),e="";return $.each(o,function(r,t){t.classList!==void 0&&t.classList.contains("user-name")?e=e+t.lastChild.firstChild.textContent:t.innerText===void 0?e=e+t.textContent:e=e+t.innerText}),e}}}},{extend:"excel",text:'<i class="ti ti-file-spreadsheet me-2"></i>Excel',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(s,n,a){if(s.length<=0)return s;var o=$.parseHTML(s),e="";return $.each(o,function(r,t){t.classList!==void 0&&t.classList.contains("user-name")?e=e+t.lastChild.firstChild.textContent:t.innerText===void 0?e=e+t.textContent:e=e+t.innerText}),e}}}},{extend:"pdf",text:'<i class="ti ti-file-code-2 me-2"></i>Pdf',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(s,n,a){if(s.length<=0)return s;var o=$.parseHTML(s),e="";return $.each(o,function(r,t){t.classList!==void 0&&t.classList.contains("user-name")?e=e+t.lastChild.firstChild.textContent:t.innerText===void 0?e=e+t.textContent:e=e+t.innerText}),e}}}},{extend:"copy",text:'<i class="ti ti-copy me-2" ></i>Copy',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(s,n,a){if(s.length<=0)return s;var o=$.parseHTML(s),e="";return $.each(o,function(r,t){t.classList!==void 0&&t.classList.contains("user-name")?e=e+t.lastChild.firstChild.textContent:t.innerText===void 0?e=e+t.textContent:e=e+t.innerText}),e}}}}]},{text:'<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Role</span>',className:"add-new btn btn-primary waves-effect waves-light",attr:{"data-bs-toggle":"modal","data-bs-target":"#openModalAddRoleAccess"}}]});$(".datatables-role-access tbody").on("click",".delete-record",function(){var s=$(this).data("id");Swal.fire({title:"Are you sure?",text:"You won't be able to revert Role Access!",icon:"warning",showCancelButton:!0,confirmButtonText:"Yes, delete Role Access!",customClass:{confirmButton:"btn btn-primary me-2 waves-effect waves-light",cancelButton:"btn btn-label-secondary waves-effect waves-light"},buttonsStyling:!1}).then(function(n){n.value?$.ajax({type:"GET",dataType:"json",url:"/setting/deleteRoleAccessProses/"+s,success:function(a){a.success==!0&&(u.row($(this).parents("tr")).remove().draw(),Swal.fire({width:420,padding:7,position:"bottom-right",toast:!0,icon:"success",title:"Success",text:`${a.message}`,showConfirmButton:!1,timer:3e3,timerProgressBar:!0,backgroundColor:"#28a745",titleColor:"#fff"}),$(".datatables-role-access").DataTable().ajax.reload())}}):n.dismiss===Swal.DismissReason.cancel&&Swal.fire({title:"Cancelled",text:"Cancelled Deleted :)",icon:"error",customClass:{confirmButton:"btn btn-success waves-effect waves-light"}})})})});(function(){addNewRoleStForm=document.getElementById("addNewRoleStForm"),FormValidation.formValidation(addNewRoleStForm,{fields:{rs_nama:{validators:{notEmpty:{message:"Please enter Role Name"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({eleValidClass:"",rowSelector:function(l,i){return".mb-3"}}),submitButton:new FormValidation.plugins.SubmitButton,autoFocus:new FormValidation.plugins.AutoFocus}})})();
