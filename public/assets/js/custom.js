/**
 * Creol studio practical task.
 */
(function(jq) {
   "use strict";
   let jsManager = {
         addressData: [],
         states: [],
         validateAddress:false,
         baseUrl: window.location.origin,
         stringTrimmer: function(stringToTrim)
         {
            return jq.trim(stringToTrim);
         },

         validateAddressinputs: function(){
            jq('.child_div_address').each(function(){
               let titleVal = jsManager.stringTrimmer( jq(this).find('.adress_title').val() );
               if ( titleVal ) {
                   jq(this).find('.adress_title').removeClass('frm_err');
                   jsManager.validateAddress = true;
                   jq('.err_container').text('');
               } else {
                  jq(this).find('.adress_title').addClass('frm_err');
                  jq('.err_container').text('Please make sure all fields are filled in correctly.');
                  return jsManager.validateAddress = false;
               }

               let addressLineOne = jsManager.stringTrimmer( jq(this).find('.address_line1').val() );
               if ( addressLineOne ) {
                   jq(this).find('.address_line1').removeClass('frm_err');
                   jsManager.validateAddress = true;
                   jq('.err_container').text('');
               } else {
                  jq(this).find('.address_line1').addClass('frm_err');
                  jq('.err_container').text('Please make sure all fields are filled in correctly.');
                  return jsManager.validateAddress = false;
               }
    

               let addressLineTwo = jsManager.stringTrimmer( jq(this).find('.address_line2').val() );
               if ( addressLineTwo ) {
                   jq(this).find('.address_line2').removeClass('frm_err');
                   jsManager.validateAddress = true;
                   jq('.err_container').text('');
               } else {
                  jq(this).find('.address_line2').addClass('frm_err');
                  jq('.err_container').text('Please make sure all fields are filled in correctly.');
                  return jsManager.validateAddress = false;
               }

               let countryIs = jsManager.stringTrimmer( jq(this).find('.country').val() );
               if ( countryIs ) {
                   jq(this).find('.country').removeClass('frm_err');
                   jsManager.validateAddress = true;
                   jq('.err_container').text('');
               } else {
                  jq(this).find('.country').addClass('frm_err');
                  jq('.err_container').text('Please make sure all fields are filled in correctly.');
                  return jsManager.validateAddress = false;
               }

               let stateIs = jsManager.stringTrimmer( jq(this).find('.state').val() );
               if ( stateIs ) {
                   jq(this).find('.state').removeClass('frm_err');
                   jsManager.validateAddress = true;
                   jq('.err_container').text('');
               } else {
                  jq(this).find('.state').addClass('frm_err');
                  jq('.err_container').text('Please make sure all fields are filled in correctly.');
                  return jsManager.validateAddress = false;            }

               let cityIs = jsManager.stringTrimmer( jq(this).find('.city').val() );
               if ( cityIs ) {
                   jq(this).find('.city').removeClass('frm_err');
                   jsManager.validateAddress = true;
                   jq('.err_container').text('');
               } else {
                  jq(this).find('.city').addClass('frm_err');
                  jq('.err_container').text('Please make sure all fields are filled in correctly.');
                  return jsManager.validateAddress = false;
               }

               let pinIs = jsManager.stringTrimmer( jq(this).find('.pin').val() );
                if ( pinIs ) {
                   jq(this).find('.pin').removeClass('frm_err');
                   jsManager.validateAddress = true;
                   jq('.err_container').text('');
               } else {
                  jq(this).find('.pin').addClass('frm_err');
                  jq('.err_container').text('Please make sure all fields are filled in correctly.');
                  return jsManager.validateAddress = false;
               }

            });
         },

         displayAjaxResponse: function(response) {
            if ( typeof response.status != 'undefined' && typeof response.message != 'undefined' ) {
              if ( response.status == 1 ) {
                new noty({
                   type: 'success',
                   layout: 'topCenter',
                   text: response.message,
                   timeout: 3000,
                }).show();
              } else if ( response.status == 0 ) {
                new noty({
                   type: 'error',
                   layout: 'topCenter',
                   text: response.message,
                   timeout: 3000,
                }).show();
              }
            }
         },

         collectFormData: function()
         {
             jsManager.addressData = [];
             let title = '';
             let addressline1 = '';
             let addressline2 = '';
             let country = '';
             let state = '';
             let city = '';
             let pincode = '';

            jq('.child_div_address').each(function(){
               let titleVal = jsManager.stringTrimmer( jq(this).find('.adress_title').val() );
               if ( titleVal ) {
                  title = titleVal;
               }

               let addressLineOne = jsManager.stringTrimmer( jq(this).find('.address_line1').val() );
               if ( addressLineOne ) {
                  addressline1 = addressLineOne;
               } 

               let addressLineTwo = jsManager.stringTrimmer( jq(this).find('.address_line2').val() );
               if ( addressLineTwo ) {
                  addressline2 = addressLineTwo;
               }

               let countryIs = jsManager.stringTrimmer( jq(this).find('.country').val() );
               if ( countryIs ) {
                  country = countryIs;
               }

               let stateIs = jsManager.stringTrimmer( jq(this).find('.state').val() );
               if ( stateIs ) {
                  state = stateIs;
               }

               let cityIs = jsManager.stringTrimmer( jq(this).find('.city').val() );
               if ( cityIs ) {
                  city = cityIs;
               }

               let pinIs = jsManager.stringTrimmer( jq(this).find('.pin').val() );
               if ( pinIs ) {
                  pincode = pinIs;
               }

               jsManager.addressData.push({
                   "title" : titleVal,
                   "addressline1" : addressLineOne,
                   "addressline2" : addressLineTwo,
                   "country" : countryIs,
                   "state" : stateIs,
                   "city" : cityIs,
                   "pincode" : pinIs,
               });
            });
         },

         disableButton: function(){
            jq('.password-update').prop('disabled', true);
            jq('.profile-button').prop('disabled', true);
         },

         enableButton: function(){
            jq('.password-update').prop('disabled', false);
            jq('.profile-button').prop('disabled', false);
         },

         renderNewAddress: function(){
               return `<div class="child_div_address">
                  <div class="address_input">
                     <div class="form-group row">
                        <label class="col-md-4 detail-title">Title
                        </label>
                        <div class="col-md-8">
                           <input name="adress_title" type="text" class="form-control custom-input mb-2  adress_title" placeholder="Title" autocomplete="off">
                        </div>
                     </div>
                  </div>
                  <div class="address_input">
                     <div class="form-group row">
                        <label class="col-md-4 detail-title">Address Line 1
                        </label>
                        <div class="col-md-8">
                           <input name="address_line1" type="text" class="form-control address_line1 mb-2" placeholder="Address line 1" autocomplete="off">
                        </div>
                     </div>
                  </div>
                  <div class="address_input">
                     <div class="form-group row">
                        <label class="col-md-4 detail-title">Address Line 2
                        </label>
                        <div class="col-md-8">
                           <input name="address_line2" type="text" class="form-control custom-input mb-2  address_line2" placeholder="Address line 2" autocomplete="off">
                        </div>
                     </div>
                  </div>
                  <div class="address_input">
                     <div class="form-group row">
                        <label class="col-md-4 detail-title">Country
                        </label>
                        <div class="col-md-8">
                           <!--  <input name="country" type="text" class="form-control custom-input mb-2  country" placeholder="Country" autocomplete="off"> -->
                           <select class="custom-select country">
                              <option value="">
                                 Select Country
                              </option>
                              <option value="india">
                                 India
                              </option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="address_input">
                     <div class="form-group row">
                        <label class="col-md-4">State
                        </label>
                        <div class="col-md-8">
                           <select class="custom-select state">
                              <option value="madhyapradesh">
                                 Select State
                              </option>
                              <option value="madhyapradesh">
                                 Madhya Pradesh
                              </option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="address_input">
                     <div class="form-group row">
                        <label class="col-md-4">City
                        </label>
                        <div class="col-md-8">
                           <input name="city" type="text" class="form-control custom-input mb-2  city" placeholder="City" autocomplete="off">
                        </div>
                     </div>
                  </div>
                  <div class="address_input">
                     <div class="form-group row">
                        <label class="col-md-4 detail-title">Pincode
                        </label>
                        <div class="col-md-8">
                           <input name="pin" type="text" class="form-control mb-2 pin" placeholder="Pin" autocomplete="off">
                        </div>
                     </div>
                  </div>
               <a href="javascript:void(0)" class="btn btn-secondary add_new_address">Add New</a></div>`;
         },

         updateUserProfile: function(){
            let userNameIs = jq.trim(jq('.user_name').val());
            let userGender = jq("input[name=gender]:checked").val();

            if ( userNameIs && userGender) {
               jq.ajax({
                  url: '/user/update-profile',
                  type: 'post',
                  data: {
                     userNameIs: userNameIs,
                     userGender: userGender
                  },
                  dataType: 'json',
                  success: function(response) {
                     jsManager.enableButton();
                     if (response.status == 1) {
                        jsManager.displayAjaxResponse(response);
                     } else {
                        jsManager.displayAjaxResponse(response);
                     }
                  },
                  error: function(){
                     jsManager.enableButton();
                  }
               });
            } else {
               jsManager.enableButton();
            }
         },

         countryChangeDone: function(){
            let countryNameString = jq('.country').val();
               jq.ajax({
                  url: '/user/fetch-states',
                  type: 'get',
                  data: {
                     country: countryNameString,
                  },
                  dataType: 'json',
                  success: function(response) {
                     jsManager.enableButton();
                     if (response.status == 1) {
                        jsManager.states = response.states;
                        jsManager.updateStatesSelect();
                     } else {
                        
                     }
                  },
                  error: function(){
                     location.realod();
                  }
               });
         },

         updateStatesSelect: function(){
            jq('.state').empty();
            let allStates = jsManager.states;
            jq.each(allStates, function(index, val) {
                  jq('.state').append('<option value="'+val+'">'+val+'</option>');
            });
              let stateVal = jq('.state_is_').val();
              jq('.state option[value="'+stateVal+'"]').prop("selected", true);
         },

         storeUserAddresses: function(){
            let addressDataArray = jsManager.addressData;

            if ( addressDataArray ) {
               jq.ajax({
                  url: '/user/add-addresses',
                  type: 'post',
                  data: {
                     addressDataArray: addressDataArray,
                  },
                  dataType: 'json',
                  success: function(response) {
                     jsManager.enableButton();
                     if (response.status == 1) {
                        jsManager.displayAjaxResponse(response);
                         setTimeout(function(){
                           window.location = jsManager.baseUrl + "/user/addresses";
                        }, 3000);
                     } else {
                        jsManager.displayAjaxResponse(response);
                     }
                  },
                  error: function(){
                     jsManager.enableButton();
                  }
               });
            } else {
               jsManager.enableButton();
            }
         },

         updateUserAddresse: function(){
            let addressDataArray = jsManager.addressData;
            let addId =  jq('.address_own').val();
            if ( addressDataArray ) {
               jq.ajax({
                  url: '/user/address-update',
                  type: 'post',
                  data: {
                     addressDataArray: addressDataArray,
                     id:addId
                  },
                  dataType: 'json',
                  success: function(response) {
                     jsManager.enableButton();
                     if (response.status == 1) {
                        jsManager.displayAjaxResponse(response);
                        setTimeout(function(){
                           window.location = jsManager.baseUrl + "/user/addresses";
                        }, 3000);
                     } else {
                        jsManager.displayAjaxResponse(response);
                     }
                  },
                  error: function(){
                     jsManager.enableButton();
                  }
               });
            } else {
               jsManager.enableButton();
            }
         },

         updateUserPassword: function()
         {
               let currentPassword = jq.trim(jq('.current_password').val());
               let newPassword = jq.trim(jq('.new_password').val());
               let passwordConfirmation = jq.trim(jq('.password_confirmation').val());

               if ( currentPassword && newPassword && passwordConfirmation) {
                  jq.ajax({
                     url: '/user/change-password',
                     type: 'post',
                     data: {
                        currentPassword: currentPassword,
                        newPassword: newPassword,
                        passwordConfirmation: passwordConfirmation
                     },
                     dataType: 'json',
                     success: function(response) {
                        jsManager.enableButton();
                        if (response.status == 1) {
                           jsManager.displayAjaxResponse(response);
                        }
                        if (response.status == 0) {
                           jsManager.displayAjaxResponse(response);
                        }
                     },
                     error: function(){
                        jsManager.enableButton();
                     }
                  });
               } else {
                  jsManager.enableButton();
               }
         }
   }

   jq(document).ready(function()
   { 
      
      //Global ajax Settings
       jq.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

      jsManager.countryChangeDone();

      jq(document).on('click', '.profile-button', function(){
         jsManager.disableButton();
         jsManager.updateUserProfile();
      });

      jq(document).on('click', '.password-update', function(){
         jsManager.disableButton();
         jsManager.updateUserPassword();
      });

      jq(document).on('click', '.add_new_address', function(){
         let adreeshtml = jsManager.renderNewAddress();
         jq('.address_main').append(adreeshtml);
      });

      jq(document).on('click', '.save_addresses', function(){
         jsManager.collectFormData();
         jsManager.validateAddressinputs();
         if ( jsManager.validateAddress ) {
          jsManager.storeUserAddresses();
         }
      });

      jq(document).on('change', '.country', function(){
         jsManager.countryChangeDone();
      });

      jq(document).on('click', '.update_addresses', function(){
         jsManager.collectFormData();
         jsManager.validateAddressinputs();

         if ( jsManager.validateAddress ) {
          jsManager.updateUserAddresse();
         }
      });
   });
})
(jQuery);