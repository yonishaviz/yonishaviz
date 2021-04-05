<script>
  (function(){
const currentImage = document.querySelector('#currentImage');
const images = document.querySelectorAll('.product-section-thumbnail');
images.forEach((element)=> element.addEventListener('click',thumbnailClick));
function thumbnailClick(e){
 currentImage.src = this.querySelector('img').src;
 

}
  }

    )();


</script>