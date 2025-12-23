function update_lessons(id, date, auditoria){
    let id_schedule = document.getElementById('id_schedule');
    let date_update = document.getElementById('date_update');
    let kabinet_update = document.getElementById('kabinet_update');
    id_schedule.value = id;
    date_update.value = date;
    kabinet_update.value = auditoria;

}
function update_grade(id_grades, och){
    let id_grades_ = document.getElementById('id_grades');
    let och_ = document.getElementById('och');
    id_grades_.value = id_grades;
    och_.value = och;
}


let change_role = document.getElementById('change_role');
if(change_role != undefined){
    change_role.addEventListener('change', function(e){
        let role = e.target.value;
        if(role == 'student'){
            document.getElementById('block_reg_students').style.display = 'block';
            document.getElementById('block_reg_techer').style.display = 'none';

        }else{
            document.getElementById('block_reg_students').style.display = 'none';
            document.getElementById('block_reg_techer').style.display = 'block';
        }
    })
}





document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slider-item');
    const prevBtn = document.querySelector('.left .btn');
    const nextBtn = document.querySelector('.right .btn');
    
    let currentIndex = 0;
    const visibleSlides = 2;
    
    function updateSlider() {
        slides.forEach((slide, index) => {
            if (index >= currentIndex && index < currentIndex + visibleSlides) {
                setTimeout(() => {
                    slide.classList.add('active');
                }, 50);
            } else {
                slide.classList.remove('active');
            }
        });
    }
    
    function nextSlide() {
        if (currentIndex < slides.length - visibleSlides) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateSlider();
    }
    
    function prevSlide() {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = slides.length - visibleSlides;
        }
        updateSlider();
    }
    if(nextBtn != undefined){
            nextBtn.addEventListener('click', nextSlide);

    }
    if(prevBtn != undefined){
    prevBtn.addEventListener('click', prevSlide);

    }
    
    updateSlider();
});


