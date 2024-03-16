//sidebar
const menuItems = document.querySelectorAll('.menu-item');

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

//removeactive class from all items

const changeActiveItem = () => {
    menuItems.forEach(item => {
        item.classList.remove('active');
    })
}

//theme/display customization
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
//Profile-Customize


const profile = document.querySelector("#profilepic");
const customizeProfile = document.querySelector('.customize-profile');

//Open

const openCustomizeProfile = () => {
     if (customizeProfile.style.transform == 'scale(1)') {
        customizeProfile.style.transform = 'scale(0)';

    }
    else {   
        customizeProfile.style.transform = 'scale(1)';
    }

}

profile.addEventListener('click', openCustomizeProfile);

//Close

document.addEventListener("click", function(event) {
  var isClickInside = customizeProfile.contains(event.target) || profile === event.target;
  if (!isClickInside) {
    customizeProfile.style.transform = 'scale(0)';
    }
});


//Create_Post_ Menu
const createMenuButton = document.querySelector("#createMenuButton");
const createMenuButton2 = document.querySelector("#createMenuButton2");
const createMenu = document.querySelector(".createMenu");

//open Menu

const openCreateMenu = () => {
    if (createMenu.style.transform == 'scale(1)') {
        createMenu.style.transform = 'scale(0)';
    }
    else {
        
        createMenu.style.transform = 'scale(1)';
    }
}

createMenuButton2.addEventListener("click", openCreateMenu);




//Close Menu

document.addEventListener("click", function(event) {
    const isClickInside = createMenu.contains(event.target) || createMenuButton === event.target || createMenuButton2 === event.target; 
  if (!isClickInside) {
    createMenu.style.transform = 'scale(0)';
    }
});

// Post Popup

const createPostButton = document.querySelector("#createPostButton");
const createPost = document.querySelector("#createPost");

//openCreatePost

const openCreatePost=()=> {
    createPost.style.transform = 'scale(1)';
}

createPostButton.addEventListener('click', openCreatePost);

//closeCreatePost

const closeCreatePost = (e) => {
    if (e.target.classList.contains('createPost')) {
        createPost.style.transform = 'scale(0)';
    }
}

createPost.addEventListener('click', closeCreatePost);

//Story Popup

const createStoryButton = document.querySelector('#createStoryButton');
const createStory = document.querySelector('#createStory');

//Open Create Story

const openCreateStory=()=> {
        createStory.style.transform = 'scale(1)';
}

createStoryButton.addEventListener('click', openCreateStory);

//closeCreateStory

const closeCreateStory = (e) => {
    if (e.target.classList.contains('createStory')) {
        createStory.style.transform = 'scale(0)';
    }
}

createStory.addEventListener('click', closeCreateStory);





//Change DP
const editProfilePicToggle = document.querySelector("#editProfilePic");
const changeDp = document.querySelector('.changeDp');
const changeDpCard = document.querySelector('.changeDP-card');

const openChangeDp = () => {
    
        changeDp.style.transform = "scale(1)";
        
}

editProfilePicToggle.addEventListener('click', openChangeDp);

const closeChangeDp = (e) => {
    if (e.target.classList.contains('changeDp')) {
        changeDp.style.transform = "scale(0)";
        
    }
}
//close modal
changeDp.addEventListener('click', closeChangeDp);


//Like Button

const likeButton = document.querySelectorAll(".likeButton");

likeButton.forEach(item => {
    item.addEventListener('click', () => {
        if (item.classList.contains("likeActive")) {
            item.classList.remove("likeActive");
        }
        else {
            item.classList.add('likeActive');
        }
    });
});

const interactions = document.querySelectorAll(".interaction-buttons span");

interactions.forEach(item => {
    item.addEventListener('touchstart', () => {
        item.style.transition="all 0ms ease"
        item.style.backgroundColor="hsl(252, 30%, 95%)";
    });
});

interactions.forEach(item => {
    item.addEventListener('touchend', () => {
        item.style.backgroundColor = "initial";
        item.style.transition="all 300ms ease"
    });
});


//Edit Post

const editPostButton = document.querySelectorAll(".edit");
const editPost = document.querySelector(".postoptions");

const closeEditPost = () => {
    editPostButton.forEach(item => {
        item.classList.remove('active');
    })
}

editPostButton.forEach(item => {
    item.addEventListener('click', () => {
        if (item.classList.contains("active")) {
            item.classList.remove("active");
        }
        else {
            closeEditPost();
            item.classList.add('active');
        }
    });
});

editPostButton.forEach(item => {
    item.addEventListener('touchstart', () => {
       item.style.transition = "all 0ms ease";
       item.style.backgroundColor="hsl(252, 30%, 95%)";
    });
});

editPostButton.forEach(item => {
    item.addEventListener('touchend', () => {
        item.style.backgroundColor = "initial";
        item.style.transition="all 300ms ease"
    });
});


document.addEventListener("click", function(event) {

  var isClickInside = editPost.contains(event.target);

  if (!isClickInside) {
    editPostButton.forEach(function(button) {
      if (button === event.target || button.contains(event.target)) {
        return;
      }
      button.classList.remove("active");
    });
  }
});



//=====================Select Video or Photo============================
const imageUploadPost = document.querySelector("#imageUploadPost");
const videoUploadPost = document.querySelector("#videoUploadPost");
const UploadPost=document.querySelector(".UploadPost");
const UploadVideoPost=document.querySelector(".UploadVideoPost");
const imageSelected = () => {
    imageUploadPost.style.display = "none";
    videoUploadPost.style.display = "none";
    UploadPost.style.display = "flex";
}
const videoSelected = () => {
    imageUploadPost.style.display = "none";
    videoUploadPost.style.display = "none";
    UploadVideoPost.style.display = "flex";
}

imageUploadPost.addEventListener('click', imageSelected);

videoUploadPost.addEventListener('click', videoSelected);




/*=========================================Notification=====================================*/
const notificationButton = document.querySelector("#notifications");
const notification = document.querySelector(".notificationpage");
const closeNotificationButton = document.querySelector(".backButton");
const notificationCount = document.querySelector('.notification-count');

const openNotificationBox = () => {
    if (window.innerWidth > 992) {
        notificationCount.style.display = "none";
        notification.style.transition = "all 300ms ease";
        notification.style.transform = "scale(1)";
        document.body.style.overflow = 'hidden';
    }
    else {
        notificationCount.style.display = "none";
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



const btn = document.querySelectorAll(".btn-primary");


btn.forEach(item => {
    item.addEventListener('touchstart', () => {
        item.style.transition="all 0ms ease"
        item.style.backgroundColor = "white";
        item.style.color = "black";
    });
});

btn.forEach(item => {
    item.addEventListener('touchend', () => {
        item.style.backgroundColor = "black";
        item.style.color = "white";
        item.style.transition="all 300ms ease"
    });
});




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

const Explore = document.querySelector('#Explore');
const ExplorePage = document.querySelector('.ExplorePage');
const ExploreCard = document.querySelector(".explore-card");
const BackButtonEx = document.querySelector('.backButtonEx');

const openExplorePage = () => {
    if (window.innerWidth > 992) {
        ExplorePage.style.transition = "all 300ms ease";
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
        ExplorePage.style.transition = "all 300ms ease";
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





//=================Liked BY===========================

const likedByButton = document.querySelectorAll(".liked-by");
const likedBy = document.querySelectorAll(".LikedBy");
const backButtonLikedBy = document.querySelectorAll(".backButtonLikedBy");


likedByButton.forEach(button => {
  button.addEventListener('click', () => {
    // Find the associated commentsView element
    const LikedBy = button.nextElementSibling;
    
    // Display the commentsView element as flex
      if (LikedBy) {
          if (window.innerWidth > 992) {
              
              LikedBy.style.transition = 'all 300ms ease';
              LikedBy.style.transform = 'scale(1)';
              document.body.style.overflow = 'hidden';
          }
          else {
              
              LikedBy.style.transition = 'all 500ms ease';
              LikedBy.style.transform = 'translateY(0)';
              document.body.style.overflow = 'hidden';
          }
      }
  });
});


backButtonLikedBy.forEach(button => {
  button.addEventListener('click', () => {
    likedBy.forEach(likedByElement => {
       
            if (window.innerWidth > 992) {
                likedByElement.style.transition = 'all 300ms ease';
                likedByElement.style.transform = 'scale(0)';
                document.body.style.overflow = 'auto';
            }
            else {
                likedByElement.style.transition = 'all 800ms ease';
                likedByElement.style.transform = 'translateY(200vh)';
                document.body.style.overflow = 'auto';
            }

    });
  });
});


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
