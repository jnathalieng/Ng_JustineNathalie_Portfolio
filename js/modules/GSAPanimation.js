export function gsapAnimations() {

  // GSAP Hero Animation
  // I’m animating the hero section using GSAP so it feels playful and alive

  const hiImg = document.querySelector(".hi-img");
  const lilmeAvatar = document.querySelector(".lilme-avatar");
  const lilmeCircle = document.querySelector(".lilme-circle");
  const nameLine = document.querySelector(".name-line");
  const subtitle = document.querySelector(".subtitle");
  const learnButton = document.querySelector(".section-learn-btn");

  // Contact Page Animations
  // I added simple gsap fade animation for the contact page to make the messages feel softer

  const contactCard = document.querySelector(".contact-card-inner");
  const thankBox = document.querySelector(".contact-thankyou");
  const errorBox = document.querySelector(".contact-error-box");

  function animateHero() {
    const heroTimeline = gsap.timeline();

    heroTimeline.from(hiImg, {
      opacity: 0,
      y: 40,
      duration: 0.8,
      ease: "power3.out"
    });

    heroTimeline.from(lilmeAvatar, {
      yPercent: 100,
      opacity: 1,
      duration: 1,
      ease: "elastic.out(0.5, 0.4)"
    }, "-=0.2");

    heroTimeline.from(nameLine, {
      opacity: 0,
      y: 20,
      duration: 0.7,
      ease: "power3.out"
    }, "-=0.3");

    heroTimeline.from(subtitle, {
      opacity: 0,
      y: 20,
      duration: 0.7,
      ease: "power3.out"
    }, "-=0.3");

    if (learnButton) {
      heroTimeline.from(learnButton, {
        opacity: 0,
        y: 15,
        duration: 0.6,
        ease: "power3.out"
      }, "-=0.3");
    }

    gsap.to(lilmeAvatar, {
      y: -10,
      duration: 2.4,
      repeat: -1,
      yoyo: true,
      ease: "sine.inOut",
      delay: 1.6
    });

    if (lilmeCircle) {
      gsap.to(lilmeCircle, {
        scale: 1.03,
        duration: 3,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
      });
    }
  }

  function animateContact() {
    if (contactCard) {
      gsap.from(contactCard, {
        opacity: 0,
        y: 30,
        duration: 0.9,
        ease: "power2.out"
      });
    }

    if (thankBox) {
      gsap.from(thankBox, {
        opacity: 0,
        y: 15,
        duration: 0.8,
        ease: "power2.out",
        delay: 0.1
      });
    }

    if (errorBox) {
      gsap.from(errorBox, {
        opacity: 0,
        y: 15,
        duration: 0.8,
        ease: "power2.out",
        delay: 0.1
      });
    }
  }

  if (typeof gsap === "undefined") {
    return;
  }

  if (hiImg && lilmeAvatar && nameLine && subtitle) {
    animateHero();
  }

  if (contactCard || thankBox || errorBox) {
    animateContact();
  }

}