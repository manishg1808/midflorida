/**
 * Mid Florida Scholars Academy - Cuemath Interactive Engine
 * Handles Navigation, Grade Explorer Tabs, Free Trial Modal, Video Modals, FAQs, Reviews
 */

document.addEventListener('DOMContentLoaded', function () {
  // --- Sticky Header & Dynamic Scroll-to-Top Engine ---
  const headerWrapper = document.querySelector('.crenshaw-header-wrapper');
  const mainNav = document.getElementById('crenshawMainNav');
  const scrollToTopBtn = document.getElementById('scrollToTopBtn');
  const scrollProgressBar = document.getElementById('scrollProgressBar');
  const circleCircumference = 138.2; // 2 * Math.PI * 22 ≈ 138.23

  function onWindowScroll() {
    const scrollY = window.pageYOffset || document.documentElement.scrollTop;

    // 1. Sticky Header Activation
    if (headerWrapper) {
      if (scrollY > 40) {
        headerWrapper.classList.add('is-scrolled');
        document.body.classList.add('header-is-scrolled');
      } else {
        headerWrapper.classList.remove('is-scrolled');
        document.body.classList.remove('header-is-scrolled');
      }
    }

    // 2. Scroll-to-Top Button Visibility & Circular Meter
    if (scrollToTopBtn) {
      if (scrollY > 280) {
        scrollToTopBtn.classList.add('is-visible');
      } else {
        scrollToTopBtn.classList.remove('is-visible');
      }

      if (scrollProgressBar) {
        const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
        if (maxScroll > 0) {
          const scrollFraction = Math.min(Math.max(scrollY / maxScroll, 0), 1);
          const offset = circleCircumference - (scrollFraction * circleCircumference);
          scrollProgressBar.style.strokeDashoffset = offset;
        }
      }
    }
  }

  window.addEventListener('scroll', onWindowScroll, { passive: true });
  window.addEventListener('resize', onWindowScroll, { passive: true });
  onWindowScroll(); // Run immediately on load

  if (scrollToTopBtn) {
    scrollToTopBtn.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  // --- Mobile Navigation Toggle ---
  const mobileToggle = document.getElementById('mobileNavToggle');
  const navMenu = document.getElementById('navMenu');

  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', function () {
      navMenu.classList.toggle('is-open');
      const icon = mobileToggle.querySelector('i');
      if (icon) {
        if (navMenu.classList.contains('is-open')) {
          icon.classList.remove('fa-bars');
          icon.classList.add('fa-times');
        } else {
          icon.classList.remove('fa-times');
          icon.classList.add('fa-bars');
        }
      }
    });

    // Dropdown toggle on click/touch (both desktop and mobile)
    const navItemsWithDropdown = document.querySelectorAll('.nav-item.has-dropdown > .nav-link, .crenshaw-menu-item.has-dropdown > .crenshaw-nav-link');
    navItemsWithDropdown.forEach(function (link) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        const parentItem = this.parentElement;
        const isOpen = parentItem.classList.contains('dropdown-open') || parentItem.classList.contains('open-mobile');

        // Close other open dropdowns
        document.querySelectorAll('.crenshaw-menu-item.has-dropdown, .nav-item.has-dropdown').forEach(function (el) {
          if (el !== parentItem) {
            el.classList.remove('dropdown-open', 'open-mobile');
          }
        });

        if (window.innerWidth <= 1040) {
          parentItem.classList.toggle('open-mobile', !isOpen);
        } else {
          parentItem.classList.toggle('dropdown-open', !isOpen);
        }
      });
    });

    // Close dropdowns on outside click
    document.addEventListener('click', function (e) {
      if (!e.target.closest('.crenshaw-menu-item.has-dropdown') && !e.target.closest('.nav-item.has-dropdown')) {
        document.querySelectorAll('.crenshaw-menu-item.has-dropdown, .nav-item.has-dropdown').forEach(function (el) {
          el.classList.remove('dropdown-open');
        });
      }
    });
  }

  // --- Grade Explorer Switcher Tabs ---
  const gradeTabBtns = document.querySelectorAll('.grade-tab-btn');
  const gradePanels = document.querySelectorAll('.grade-content-panel');

  if (gradeTabBtns.length > 0) {
    gradeTabBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const targetGrade = this.getAttribute('data-grade');

        gradeTabBtns.forEach(function (b) { b.classList.remove('active'); });
        gradePanels.forEach(function (p) { p.classList.remove('active'); });

        this.classList.add('active');
        const activePanel = document.getElementById('grade-panel-' + targetGrade);
        if (activePanel) {
          activePanel.classList.add('active');
        }
      });
    });
  }

  // --- Categorized FAQ Accordion ---
  const faqQuestions = document.querySelectorAll('.faq-question, .faq-cuemath-header');
  faqQuestions.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const parentItem = this.closest('.faq-item') || this.closest('.faq-cuemath-item');
      if (parentItem) {
        const wasActive = parentItem.classList.contains('active');
        const container = parentItem.parentElement;
        const siblings = container.querySelectorAll('.faq-item, .faq-cuemath-item');
        siblings.forEach(function (sib) { sib.classList.remove('active'); });

        if (!wasActive) {
          parentItem.classList.add('active');
        }
      }
    });
  });

  // --- Goal Selector & Grade Chips ---
  const goalBtns = document.querySelectorAll('.goal-option-btn');
  goalBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      goalBtns.forEach(function (b) { b.classList.remove('active'); });
      this.classList.add('active');
    });
  });

  const gradeChips = document.querySelectorAll('.grade-chip');
  gradeChips.forEach(function (chip) {
    chip.addEventListener('click', function () {
      gradeChips.forEach(function (c) { c.classList.remove('active'); });
      this.classList.add('active');
    });
  });

  // --- Free Trial Multi-Step Modal ---
  const openTrialBtns = document.querySelectorAll('.open-trial-modal');
  const trialModal = document.getElementById('trialModalBackdrop');
  const closeTrialBtn = document.getElementById('closeTrialModal');

  if (trialModal) {
    openTrialBtns.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        trialModal.classList.add('is-active');
        document.body.style.overflow = 'hidden';
      });
    });

    if (closeTrialBtn) {
      closeTrialBtn.addEventListener('click', function () {
        trialModal.classList.remove('is-active');
        document.body.style.overflow = '';
      });
    }

    trialModal.addEventListener('click', function (e) {
      if (e.target === trialModal) {
        trialModal.classList.remove('is-active');
        document.body.style.overflow = '';
      }
    });

    // Step 1: Grade Selection Pills
    let selectedGrade = 'Class 5';
    const gradePills = trialModal.querySelectorAll('.grade-select-pill');
    gradePills.forEach(function (pill) {
      pill.addEventListener('click', function () {
        gradePills.forEach(function (p) { p.classList.remove('selected'); });
        this.classList.add('selected');
        selectedGrade = this.getAttribute('data-val');
      });
    });

    // Step Navigation
    const step1 = document.getElementById('modalStep1');
    const step2 = document.getElementById('modalStep2');
    const step3 = document.getElementById('modalStep3');
    const progressFill = document.getElementById('modalProgressFill');

    const toStep2Btn = document.getElementById('btnToStep2');
    const toStep3Btn = document.getElementById('btnToStep3');
    const finishTrialBtn = document.getElementById('btnFinishTrial');

    if (toStep2Btn && step1 && step2) {
      toStep2Btn.addEventListener('click', function () {
        step1.classList.remove('active');
        step2.classList.add('active');
        if (progressFill) progressFill.style.width = '66.66%';
      });
    }

    if (toStep3Btn && step2 && step3) {
      toStep3Btn.addEventListener('click', function () {
        const phone = document.getElementById('trialPhone');
        if (phone && !phone.value.trim()) {
          alert('Please enter your phone number to continue.');
          phone.focus();
          return;
        }
        step2.classList.remove('active');
        step3.classList.add('active');
        if (progressFill) progressFill.style.width = '100%';

        const summaryText = document.getElementById('trialConfirmGrade');
        if (summaryText) summaryText.textContent = selectedGrade;
      });
    }

    if (finishTrialBtn) {
      finishTrialBtn.addEventListener('click', function () {
        trialModal.classList.remove('is-active');
        document.body.style.overflow = '';
        // Reset to Step 1 for next time
        if (step1 && step3) {
          step3.classList.remove('active');
          step1.classList.add('active');
          if (progressFill) progressFill.style.width = '33.33%';
        }
        alert('🎉 Congratulations! Your 1:1 Live Trial Class has been scheduled. Our academic counselor will reach out via WhatsApp/SMS shortly.');
      });
    }
  }

  // --- Video Modal Player ---
  const videoModal = document.getElementById('videoModalBackdrop');
  const videoTriggers = document.querySelectorAll('.open-video-modal');
  const closeVideoBtn = document.getElementById('closeVideoModal');
  const videoIframe = document.getElementById('videoPlayerFrame');

  if (videoModal && videoTriggers.length > 0) {
    videoTriggers.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        const videoUrl = this.getAttribute('data-video') || 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1';
        if (videoIframe) videoIframe.src = videoUrl;
        videoModal.classList.add('is-active');
        document.body.style.overflow = 'hidden';
      });
    });

    if (closeVideoBtn) {
      closeVideoBtn.addEventListener('click', function () {
        if (videoIframe) videoIframe.src = '';
        videoModal.classList.remove('is-active');
        document.body.style.overflow = '';
      });
    }

    videoModal.addEventListener('click', function (e) {
      if (e.target === videoModal) {
        if (videoIframe) videoIframe.src = '';
        videoModal.classList.remove('is-active');
        document.body.style.overflow = '';
      }
    });
  }

  // --- Hero Background Video Play/Pause Toggle ---
  const heroVideo = document.getElementById('heroCampusVideo');
  const heroVideoToggle = document.getElementById('heroVideoToggle');
  if (heroVideo && heroVideoToggle) {
    heroVideoToggle.addEventListener('click', function () {
      const icon = heroVideoToggle.querySelector('i');
      if (heroVideo.paused) {
        heroVideo.play();
        if (icon) {
          icon.classList.remove('fa-play');
          icon.classList.add('fa-pause');
        }
      } else {
        heroVideo.pause();
        if (icon) {
          icon.classList.remove('fa-pause');
          icon.classList.add('fa-play');
        }
      }
    });
  }

  // ==========================================================================
  // --- 3D HERO INTERACTIVE MOUSE SWING & PARALLAX PHYSICS ENGINE ---
  // ==========================================================================
  (function initHero3DSwingEngine() {
    const stages = document.querySelectorAll('.hero-3d-interactive-stage');
    if (!stages.length) return;

    stages.forEach(function (stage) {
      const parentSection = stage.closest('section') || stage.parentElement;
      const card = stage.querySelector('.hero-3d-card');
      const glare = stage.querySelector('.hero-3d-glare');
      const floatingElements = stage.querySelectorAll('[data-depth]');
      const floatingBook = stage.querySelector('.hero-3d-floating-book');
      if (!card) return;

      let targetRotX = 0;
      let targetRotY = 0;
      let currentRotX = 0;
      let currentRotY = 0;
      let isHoveringZone = false;
      let isHoveringStage = false;
      let floatTime = Math.random() * 10; // offset oscillation per stage

      // Maximum tilt angles in degrees
      const MAX_TILT_X = 14;
      const MAX_TILT_Y = 18;

      const trackingZone = parentSection || stage;

      function handlePointerMove(clientX, clientY) {
        const rect = stage.getBoundingClientRect();
        const stageCenterX = rect.left + rect.width / 2;
        const stageCenterY = rect.top + rect.height / 2;

        const maxDistX = Math.max(window.innerWidth / 2, rect.width);
        const maxDistY = Math.max(window.innerHeight / 2, rect.height);

        let normX = (clientX - stageCenterX) / maxDistX;
        let normY = (clientY - stageCenterY) / maxDistY;

        normX = Math.max(-1, Math.min(1, normX));
        normY = Math.max(-1, Math.min(1, normY));

        targetRotX = -normY * MAX_TILT_X;
        targetRotY = normX * MAX_TILT_Y;

        if (isHoveringStage && glare) {
          const stageX = Math.max(0, Math.min(rect.width, clientX - rect.left));
          const stageY = Math.max(0, Math.min(rect.height, clientY - rect.top));
          const glarePercentX = (stageX / rect.width) * 100;
          const glarePercentY = (stageY / rect.height) * 100;

          glare.style.background = `radial-gradient(circle at ${glarePercentX.toFixed(1)}% ${glarePercentY.toFixed(1)}%, rgba(255, 255, 255, 0.42) 0%, rgba(255, 255, 255, 0.08) 45%, transparent 75%)`;
          glare.style.opacity = '1';
        }
      }

      trackingZone.addEventListener('mousemove', function (e) {
        isHoveringZone = true;
        handlePointerMove(e.clientX, e.clientY);
      }, { passive: true });

      trackingZone.addEventListener('mouseleave', function () {
        isHoveringZone = false;
        targetRotX = 0;
        targetRotY = 0;
        if (glare) glare.style.opacity = '0';
      });

      stage.addEventListener('mouseenter', function () {
        isHoveringStage = true;
      });

      stage.addEventListener('mouseleave', function () {
        isHoveringStage = false;
        if (glare) glare.style.opacity = '0';
      });

      stage.addEventListener('touchmove', function (e) {
        if (e.touches.length > 0) {
          isHoveringZone = true;
          isHoveringStage = true;
          handlePointerMove(e.touches[0].clientX, e.touches[0].clientY);
        }
      }, { passive: true });

      stage.addEventListener('touchend', function () {
        isHoveringZone = false;
        isHoveringStage = false;
        targetRotX = 0;
        targetRotY = 0;
        if (glare) glare.style.opacity = '0';
      });

      if (window.DeviceOrientationEvent) {
        window.addEventListener('deviceorientation', function (e) {
          if (!isHoveringZone && e.gamma !== null && e.beta !== null) {
            const tiltY = Math.max(-18, Math.min(18, (e.gamma / 2.5)));
            const tiltX = Math.max(-14, Math.min(14, ((e.beta - 45) / 3)));
            targetRotY = tiltY;
            targetRotX = -tiltX;
          }
        }, { passive: true });
      }

      if (floatingBook) {
        floatingBook.addEventListener('mouseenter', function () {
          floatingBook.style.transition = 'transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1)';
        });
        floatingBook.addEventListener('mouseleave', function () {
          floatingBook.style.transition = 'transform 0.15s ease-out';
        });
      }

      function update3DPhysics() {
        floatTime += 0.024;

        const ambientSwingX = Math.sin(floatTime) * 3.2;
        const ambientSwingY = Math.cos(floatTime * 0.8) * 4.2;

        const finalTargetX = isHoveringZone ? (targetRotX + ambientSwingX * 0.25) : ambientSwingX;
        const finalTargetY = isHoveringZone ? (targetRotY + ambientSwingY * 0.25) : ambientSwingY;

        currentRotX += (finalTargetX - currentRotX) * 0.082;
        currentRotY += (finalTargetY - currentRotY) * 0.082;

        card.style.transform = `rotateX(${currentRotX.toFixed(2)}deg) rotateY(${currentRotY.toFixed(2)}deg) translateZ(8px)`;

        floatingElements.forEach(function (el) {
          const depth = parseFloat(el.getAttribute('data-depth') || '1.5');
          const depthMultiplier = depth * 1.55;

          const shiftX = currentRotY * depthMultiplier;
          const shiftY = -currentRotX * depthMultiplier;
          const shiftZ = depth * 32;
          const counterRotate = currentRotY * (depth * 0.18);

          el.style.transform = `translate3d(${shiftX.toFixed(1)}px, ${shiftY.toFixed(1)}px, ${shiftZ.toFixed(1)}px) rotateZ(${counterRotate.toFixed(1)}deg)`;
        });

        requestAnimationFrame(update3DPhysics);
      }

      requestAnimationFrame(update3DPhysics);
    });
  })();

  // ==========================================================================
  // --- CLEAN HERO PHOTO AUTO-CYCLING ENGINE ("BDL BDL KE") & 3D SWING ---
  // ==========================================================================
  (function initCleanPhotoSliderAndSwing() {
    // 1. Auto-Cycling Image Sliders ("bdl bdl ke") for any clean slider on page
    const sliders = document.querySelectorAll('.clean-image-slider');
    sliders.forEach(function (slider) {
      const slides = slider.querySelectorAll('.clean-slide');
      const parentCard = slider.closest('.clean-3d-card') || slider.parentElement;
      const dots = parentCard ? parentCard.querySelectorAll('.s-dot') : [];
      let currentIndex = 0;
      let isPaused = false;

      function goToSlide(index) {
        if (!slides.length) return;
        currentIndex = (index + slides.length) % slides.length;

        slides.forEach(function (slide, idx) {
          slide.classList.toggle('active', idx === currentIndex);
        });

        dots.forEach(function (dot, idx) {
          dot.classList.toggle('active', idx === currentIndex);
        });
      }

      function nextSlide() {
        if (!isPaused) {
          goToSlide(currentIndex + 1);
        }
      }

      // Auto cycle every 3.5 seconds
      setInterval(nextSlide, 3500);

      // Pause when hovering over the card so user can inspect clearly
      slider.addEventListener('mouseenter', function () { isPaused = true; });
      slider.addEventListener('mouseleave', function () { isPaused = false; });

      // Clickable dots
      dots.forEach(function (dot) {
        dot.addEventListener('click', function (e) {
          e.preventDefault();
          const slideNum = parseInt(this.getAttribute('data-slide'), 10);
          if (!isNaN(slideNum)) {
            goToSlide(slideNum);
          }
        });
      });
    });

    // 2. Clean 3D Card Mouse Swing Tilt for all clean 3D stages
    const stages = document.querySelectorAll('.clean-3d-stage, .hero-3d-interactive-stage');
    stages.forEach(function (stage) {
      const cleanCard = stage.querySelector('.clean-3d-card');
      const heroSection = stage.closest('section') || stage.parentElement;
      if (!cleanCard) return;

      let targetX = 0;
      let targetY = 0;
      let currentX = 0;
      let currentY = 0;
      let isHovering = false;
      let floatAngle = 0;

      const trackingArea = heroSection || stage;

      trackingArea.addEventListener('mousemove', function (e) {
        isHovering = true;
        const rect = stage.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;

        const normX = (e.clientX - centerX) / (window.innerWidth / 2);
        const normY = (e.clientY - centerY) / (window.innerHeight / 2);

        // Natural smooth tilt angles
        targetX = -Math.max(-1, Math.min(1, normY)) * 10;
        targetY = Math.max(-1, Math.min(1, normX)) * 12;
      }, { passive: true });

      trackingArea.addEventListener('mouseleave', function () {
        isHovering = false;
        targetX = 0;
        targetY = 0;
      });

      function swingLoop() {
        floatAngle += 0.024;
        const ambientX = Math.sin(floatAngle) * 2;
        const ambientY = Math.cos(floatAngle * 0.8) * 2.5;

        const destX = isHovering ? (targetX + ambientX * 0.2) : ambientX;
        const destY = isHovering ? (targetY + ambientY * 0.2) : ambientY;

        currentX += (destX - currentX) * 0.085;
        currentY += (destY - currentY) * 0.085;

        cleanCard.style.transform = `rotateX(${currentX.toFixed(2)}deg) rotateY(${currentY.toFixed(2)}deg) translateZ(8px)`;

        requestAnimationFrame(swingLoop);
      }

      requestAnimationFrame(swingLoop);
    });

    // 3. Cuemath Chevron Card 3D Mouse Swing
    const chevronCard = document.getElementById('chevron3DCard');
    if (chevronCard) {
      const heroSection = chevronCard.closest('.cm-grade-hero') || chevronCard.parentElement;
      let targetX = 0, targetY = 0, currentX = 0, currentY = 0, isHovering = false, floatAngle = 0;

      const trackingArea = heroSection || chevronCard;
      trackingArea.addEventListener('mousemove', function (e) {
        isHovering = true;
        const rect = chevronCard.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;

        const normX = (e.clientX - centerX) / (window.innerWidth / 2);
        const normY = (e.clientY - centerY) / (window.innerHeight / 2);

        targetX = -Math.max(-1, Math.min(1, normY)) * 10;
        targetY = Math.max(-1, Math.min(1, normX)) * 12;
      }, { passive: true });

      trackingArea.addEventListener('mouseleave', function () {
        isHovering = false;
        targetX = 0;
        targetY = 0;
      });

      function chevronLoop() {
        floatAngle += 0.024;
        const ambientX = Math.sin(floatAngle) * 2;
        const ambientY = Math.cos(floatAngle * 0.8) * 2.5;

        const destX = isHovering ? (targetX + ambientX * 0.2) : ambientX;
        const destY = isHovering ? (targetY + ambientY * 0.2) : ambientY;

        currentX += (destX - currentX) * 0.08;
        currentY += (destY - currentY) * 0.08;

        chevronCard.style.transform = `rotateX(${currentX.toFixed(2)}deg) rotateY(${currentY.toFixed(2)}deg)`;
        requestAnimationFrame(chevronLoop);
      }
      requestAnimationFrame(chevronLoop);
    }
  })();

  // ==========================================================================
  // --- HERO DYNAMIC ROTATING WORDS ("bdl bdl ke stylish") ---
  // ==========================================================================
  (function initHeroRotatingWords() {
    const rotator = document.getElementById('heroWordRotator');
    if (!rotator) return;

    const words = rotator.querySelectorAll('.hero-rotating-word');
    if (words.length <= 1) return;

    let currentIndex = 0;

    function cycleWord() {
      const currentWord = words[currentIndex];
      const nextIndex = (currentIndex + 1) % words.length;
      const nextWord = words[nextIndex];

      // Exit current word
      currentWord.classList.remove('active');
      currentWord.classList.add('exit');

      // Enter next word
      nextWord.classList.remove('exit');
      nextWord.classList.add('active');

      setTimeout(function () {
        currentWord.classList.remove('exit');
      }, 550);

      currentIndex = nextIndex;
    }

    // Auto-cycle every 2.8 seconds
    setInterval(cycleWord, 2800);
  })();
});


