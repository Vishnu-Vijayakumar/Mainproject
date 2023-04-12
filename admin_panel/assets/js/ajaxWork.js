

function showProductItems(){  
    $.ajax({
        url:"./adminView/viewAllProducts.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showsellers(){  
    $.ajax({
        url:"./adminView/viewProductSellers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCategory(){  
    $.ajax({
        url:"./adminView/viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showSizes(){  
    $.ajax({
        url:"./adminView/viewSizes.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showProductSizes(){  
    $.ajax({
        url:"./adminView/viewProductSizes.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function showSizespdf(){  
    $.ajax({
        url:"../admin_panel/adminpdf/pdfview.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



function showSizesarticlepdf(){  
    $.ajax({
        url:"../admin_panel/articlepdf/pdfview.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function showCustomers(){
    $.ajax({
        url:"./adminView/viewCustomers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



function showSellers(){
    $.ajax({
        url:"./adminView/viewCustomers1.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function showOrders(){
    $.ajax({
        url:"./adminView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function ChangeOrderStatus(id){
    $.ajax({
       url:"./controller/updateOrderStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Order Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}

function ChangePay(id){
    $.ajax({
       url:"./controller/updatePayStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Payment Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}



//add product data
function addItems(){
    var p_name= document.getElementById("book_name").value;
    var p_desc= document.getElementById("book_desc").value;
    var p_price= document.getElementById("book_price").value;
    var category= document.getElementById("category").value;
    var upload= document.getElementById("upload_my").value;
    // var file= document.getElementById("img_file").value;
    var file= "./uploads/bg6.jpg";

    console.log("p_name is : "+p_name);

    // var fd = new FormData();
    // fd.append('p_name', p_name);
    // fd.append('p_desc', p_desc);
    // fd.append('p_price', p_price);
    // fd.append('category', category);
    // fd.append('file', file);
    // fd.append('upload', upload);
    $.ajax({
        url:"./controller/addItemController.php",
        method:"POST",
        data: {p_name: p_name, p_desc: p_desc, p_price: p_price, category: category, file: file, upload: upload},
        success: function(data){
            alert(data);
            $('form').trigger('reset');
            showProductItems();
        },
        error: function(error){
            alert(error);
        }
    });
}

//edit product data
function itemEditForm(id){
    $.ajax({
        url:"./adminView/editItemForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//update product after submit
function updateItems(){
    var product_id = $('#product_id').val();
    var p_name = $('#book_name').val();
    var p_desc = $('#book_des').val();
    var p_price = $('#book_price').val();
    var category = $('#book_category').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('book_id', product_id);
    fd.append('book_name', p_name);
    fd.append('book_des', p_desc);
    fd.append('book_price', p_price);
    fd.append('book_category', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
   
    $.ajax({
      url:'./controller/updateItemController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Data Update Success.');
        $('form').trigger('reset');
        showProductItems();
      }
    });
}

//delete product data
function itemDelete(id){
    $.ajax({
        url:"./controller/deleteItemController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}


//delete cart data
function cartDelete(id){
    $.ajax({
        url:"./controller/deleteCartController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Cart Item Successfully deleted');
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function eachDetailsForm(id){
    $.ajax({
        url:"./view/viewEachDetails.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



//delete category data
function categoryDelete(category_id){
    $.ajax({
        url:"./controller/catDeleteController.php",
        method:"post",
        data:{c_id:category_id},
        success:function(data){
            alert(data);
            $('form').trigger('reset');
            showCategory();
        }
    });
}

//delete size data
function languageDelete(id){
    $.ajax({
        url:"./controller/deleteSizeController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert(data);
            $('form').trigger('reset');
            showSizes();
        }
    });
}


//delete variation data
function variationDelete(id){
    $.ajax({
        url:"./controller/deleteVariationController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

//edit variation data
function languageEditForm(id){
    $.ajax({
        url:"./adminView/editVariationForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


//update variation after submit
function updateVariations(){
    var v_id = $('#bookstat_id').val();
    var product = $('#product').val();
    var size = $('#size').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('product', product);
    fd.append('size', size);
    fd.append('qty', qty);
   
    $.ajax({
      url:'./controller/updateVariationController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Update Success.');
        $('form').trigger('reset');
        showProductSizes();
      }
    });
}
function search(id){
    $.ajax({
        url:"./controller/searchController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.eachCategoryProducts').html(data);
        }
    });
}


function quantityPlus(id){ 
    $.ajax({
        url:"./controller/addQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}
function quantityMinus(id){
    $.ajax({
        url:"./controller/subQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function checkout(){
    $.ajax({
        url:"./view/viewCheckout.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function removeFromWish(id){
    $.ajax({
        url:"./controller/removeFromWishlist.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Removed from wishlist');
        }
    });
}


function addToWish(id){
    $.ajax({
        url:"./controller/addToWishlist.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Added to wishlist');        
        }
    });
}