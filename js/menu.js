
    const toggleBtn = document.querySelector('.toggle_btn')
    const toggleBtnIcon = document.querySelector('.toggle_btn i')
    const dropDownMenu = document.querySelector('.dropdown_menu')

    toggleBtn.addEventListener('click',() => {
        dropDownMenu.classList.toggle('open');
        const isOpen=dropDownMenu.classList.contains('open')
        
      
    });
    