
/*=============================Follow button======================*/

const followButton = document.querySelectorAll('.followButton');

followButton.forEach(item => {
    item.addEventListener('click', () => {
        if (item.classList.contains('followActive')) {
            item.classList.remove('followActive');
            item.value = "Follow";
        }
        else {
            item.classList.add('followActive');
            item.value = "Remove";
        }
    });
});

/*===============================ExplorePage============================*/

/*
const Explore = document.querySelector('#Explore');
const ExplorePage = document.querySelector('.ExplorePage');
const ExploreCard = document.querySelector(".explore-card");
const BackButtonEx = document.querySelector('.backButtonEx');

const openExplorePage = () => {
    if (window.innerWidth > 992) {
        ExplorePage.style.transform = "scale(1)";
        document.body.style.overflow = "hidden";
    }
    else {
        ExplorePage.style.transition = "all 500ms ease";
        ExplorePage.style.transform = "translateY(0)";
        document.body.style.overflow = "hidden";
    }
}

const closeExplorePage = () => {
    if (window.innerWidth > 992) {
        ExplorePage.style.transform = "scale(0)";
        document.body.style.overflow = "auto";
    }
    else {
        ExplorePage.style.transition = "all 800ms ease";
        ExplorePage.style.transform = "translateY(200vh)";
        document.body.style.overflow = "auto";
    }
    
}


Explore.addEventListener('click', openExplorePage);
BackButtonEx.addEventListener('click', closeExplorePage);
*/

/*=========================================Notification=====================================*/
const notificationButton = document.querySelector("#notifications");
const notification = document.querySelector(".notificationpage");
const closeNotificationButton = document.querySelector(".backButton");

const openNotificationBox = () => {
    if (window.innerWidth>992) {
        notification.style.transform = "scale(1)";
        document.body.style.overflow = 'hidden';
    }
    else {
        notification.style.transition = "all 500ms ease";
        notification.style.transform = "translateY(0)";
        document.body.style.overflow = 'hidden';
    }
    
}

const closeNotificationBox = () => {
    if (window.innerWidth>992) {
        notification.style.transform = "scale(0)";
        document.body.style.overflow = 'auto';
    }
    else {
        notification.style.transition = "all 800ms ease";
        notification.style.transform = "translateY(200vh)";
        document.body.style.overflow = 'auto';
    }
}

notificationButton.addEventListener("click", openNotificationBox);
closeNotificationButton.addEventListener("click", closeNotificationBox);


//theme/display customization

//theme
/*
const theme = document.querySelector("#theme");
const themeModal = document.querySelector('.customize-theme');
const fontSizes = document.querySelectorAll('.choose-size span');
var root = document.querySelector(':root');
const colorPalette = document.querySelectorAll('.choose-color span');
const Bg1 = document.querySelector('.bg-1');
const Bg2 = document.querySelector('.bg-2');
const Bg3 = document.querySelector('.bg-3');
//opens modal
const openThemeModal = () => {
    themeModal.style.display = "grid";
}
//close modal

const closeThemeModal = (e) => {
    if (e.target.classList.contains('customize-theme')) {
        themeModal.style.display = 'none';
    }
}
//close modal
themeModal.addEventListener('click', closeThemeModal);

theme.addEventListener('click', openThemeModal);




//=================fonts===================


//remove activer class from spans or font selectors
const removeSizeSelector = () => {
    fontSizes.forEach(size => {
        size.classList.remove('active');
    })
}
fontSizes.forEach(size => {   
    size.addEventListener('click', () => {
        removeSizeSelector();
        let fontSize;
        size.classList.toggle('active');

        if (size.classList.contains('font-size-1')) {
        fontSize = '10px';
        root.style.setProperty('--sticky-top-left', '5.4rem');
        root.style.setProperty('--sticky-top-right', '5.4rem');
        }
        else if (size.classList.contains('font-size-2')) {
            fontSize = '13px';
            root.style.setProperty('--sticky-top-left', '5.4rem');
            root.style.setProperty('--sticky-top-right', '-7rem');
        }
        else if (size.classList.contains('font-size-3')) {
            fontSize = '16px';
            root.style.setProperty('--sticky-top-left', '-2rem');
            root.style.setProperty('--sticky-top-right', '-17rem');
        }
        else if (size.classList.contains('font-size-4')) {
            fontSize = '19px';
            root.style.setProperty('--sticky-top-left', '-5rem');
            root.style.setProperty('--sticky-top-right', '-25rem');
        }
        else if (size.classList.contains('font-size-5')) {
            fontSize = '22px';
            root.style.setProperty('--sticky-top-left', '-10rem');
            root.style.setProperty('--sticky-top-right', '-33rem');
        }
        //change font size of root html element
        document.querySelector('html').style.fontSize = fontSize;
    })
})

//remove active class from colors
const changeActiveColorClass = () => {
    colorPalette.forEach(colorPicker => {
        colorPicker.classList.remove('active');
    })
}

//change primary color
colorPalette.forEach(color => {
    color.addEventListener('click', () => {
        let primary;
        changeActiveColorClass();
        if (color.classList.contains('color-1')) {
            primaryHue = 252;
        }
        else if(color.classList.contains('color-2')){
            primaryHue = 52;
        }
        else if(color.classList.contains('color-3')){
            primaryHue = 352;
        }
        else if(color.classList.contains('color-4')){
            primaryHue = 152;
        }
        else if(color.classList.contains('color-5')){
            primaryHue = 202;
        }
        color.classList.add('active');

        root.style.setProperty('--primary-color-hue', primaryHue);
    })
})

//themebackground

let lightColorLightness;
let whiteColorLightness;
let darkColorLightness;

//change bg color
const changeBg = ()=> {
    root.style.setProperty('--light-color-lightness', lightColorLightness);
    root.style.setProperty('--white-color-lightness', whiteColorLightness);
    root.style.setProperty('--dark-color-lightness', darkColorLightness);
}

Bg1.addEventListener('click', () => {
    //add active class
    Bg1.classList.add('active');
    //remove active class from others
    Bg2.classList.remove('active');
    Bg3.classList.remove('active');
    //remove customized changes from local storage
    window.location.reload();
})

Bg2.addEventListener('click', () => {
    darkColorLightness = '95%';
    whiteColorLightness = '20%';
    lightColorLightness = '15%';

    //add active class
    Bg2.classList.add('active');
    //remove active class from others
    Bg1.classList.remove('active');
    Bg3.classList.remove('active');
    changeBg();
})

Bg3.addEventListener('click', () => {
    darkColorLightness = '95%';
    whiteColorLightness = '10%';
    lightColorLightness = '0%';

    //add active class
    Bg3.classList.add('active');
    //remove active class from others
    Bg1.classList.remove('active');
    Bg2.classList.remove('active');
    changeBg();
})

*/

//=================Search Page===================
const Search = document.querySelector('.mobile_search');
const SearchPage = document.querySelector('.SearchPage');
const BackButtonSe = document.querySelector('.backButtonSe');

const openSearchPage = () => {
    
        SearchPage.style.transition = "all 500ms ease";
        SearchPage.style.transform = "translateY(0)";
        document.body.style.overflow = "hidden";
}

const closeSearchPage = () => {
    
        SearchPage.style.transition = "all 800ms ease";
        SearchPage.style.transform = "translateY(200vh)";
        document.body.style.overflow = "auto";
    
}

Search.addEventListener('click', openSearchPage);
BackButtonSe.addEventListener('click', closeSearchPage);

//End