 $(document).ready(function(){
  $('body').on('click','.header_cat',function(){
      let cat_id=$(this).attr('cat_id');
      let cat_name=$(this).text()
      
      $('.set_cat_id').val(cat_id)
      $('.set_cat_name').text(cat_name)
    })
    
    $('body').on('input','#slider1',function(){
  	let min=$(this).val();
  	$(this).prev('span').text(min)
  	$('.min_price').val(min);
  })

  $('body').on('input','#slider2',function(){
  	let max=$(this).val();
  	$(this).prev('span').text(max)
  	$('.max_price').val(max);
  })

})