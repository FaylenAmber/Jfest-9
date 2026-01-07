import React from "react";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import comingSoon from "@/assets/misc/coming-soon.webp";
import comingSoonMobile from "@/assets/misc/coming-soon_mobile.webp";
import firstBanner from "@/assets/tickets/ticket.webp";
import firstBannerMobile from "@/assets/tickets/ticket-mobile.webp";
import secondBanner from "@/assets/misc/banner.webp";
import secondBannerMobile from "@/assets/misc/bannerMobile.webp";
import { css, styled } from "@/root/stitches.config";
import { Button } from "@/components/button";
import { Divider } from "@/components/divider";
import { Title } from "@/components/title";
import backdrop from "@/assets/misc/backdrop2_mobile_crop.webp";
import backdropMobile from "@/assets/misc/backdrop2-mobile.webp";

const mediaOrientationLandscape = `@media screen and ${[
  "(max-width: 950px)",
  "(min-height: 100px)",
  "(orientation: landscape)",
].join(" and ")}`;

const Backdrop = styled("div", {
  position: "absolute",
  left: 0,
  bottom: 0,
  display: "block",
  width: "100%",
  height: "100%",
  backgroundSize: "100%, auto",
  backgroundPositionX: "center",
  backgroundPositionY: "bottom",
  backgroundRepeat: "no-repeat",
  "@desktop": { backgroundImage: `url("${backdrop}")` },
  "@laptop": { backgroundImage: `url("${backdrop}")` },
  "@tablet": { backgroundImage: `url("${backdrop}")` },
  "@mobile": { backgroundImage: `url("${backdropMobile}")` },
});

const Container = styled("section", {
  position: "relative",
  display: "block",
  alignItems: "center",
  justifyContent: "center",
  width: "100%",
  backgroundColor: "$dark",
  overflow: "hidden",
  "@desktop": { minHeight: "50vw" },
  "@laptop": { minHeight: "50vw" },
  "@tablet": { minHeight: "50vw" },
  "@mobile": { minHeight: "130vw" },
  [mediaOrientationLandscape]: {
    minHeight: "95vw",
  },
});

export default function Hightlight() {
  function NextArrow(props) {
    const { className, style, onClick } = props;
    return (
      <div
        className={className}
        style={{
          ...style,
          display: "block",
          background: "black",
          borderRadius: "100%",
          marginRight: "80px",
        }}
        onClick={onClick}
      />
    );
  }

  function PrevArrow(props) {
    const { className, style, onClick } = props;
    return (
      <div
        className={className}
        style={{
          ...style,
          display: "block",
          background: "black",
          marginLeft: "65px",
          zIndex: 2,
          borderRadius: "100%",
        }}
        onClick={onClick}
      >
        <i className="fas fa-chevron-left"></i>
      </div>
    );
  }

  const settings = {
    infinite: false,
    autoplay: true,
    speed: 800,
    autoplaySpeed: 4000,
    slidesToShow: 1,
    slidesToScroll: 1,
    nextArrow: <NextArrow />,
    prevArrow: <PrevArrow />,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          nextArrow: "",
          prevArrow: "",
          infinite: true,
          // dots: true,
        },
      },
    ],
    appendDots: (dots) => (
      <ul
        style={{
          position: "absolute",
          bottom: "-28px",
        }}
      >
        <div style={{ color: "white" }}>{dots}</div>
      </ul>
    ),
  };

  return (
    <Container>
      <div
        className={css({
          display: "flex",
          flexDirection: "column",
          alignItems: "center",
          paddingBottom: "50vw",
          gap: "2rem",
          zIndex: 1,
          "@mobile": {
            paddingBottom: "50vw",
            gap: "1rem",
          },
        }).toString()}
      >
        <Title
          css={{
            textAlign: "center",
            fontSize: "3.5vw",
            "@mobile": { fontSize: "7.8vw" },
          }}
          color="light"
        >
          Highlight
        </Title>
        <Divider />
        <Slider {...settings} style={{ width: "100%", zIndex: "4" }}>
          {/* <div
            className={css({
                position: "relative",
                display: "flex",
                justifyContent: "center",
                alignItems: "center",
                paddingTop: "2rem",
                "@mobile": {
                paddingTop: "0.5rem",
                }
            }).toString()}
            >
            <picture
                className={css({
                display: "flex",
                justifyContent: "center",
                alignItems: "center",
                width: "100%",
                height: "100%",
                }).toString()}
            >
                <source media="(max-width: 768px)" srcSet={firstBannerMobile} />
                <img
                src={firstBanner}
                alt="Ticket Banner"
                className={css({
                    width: "80%",
                    objectFit: "contain",
                    display: "block",
                    margin: "auto",
                    "@mobile": {
                    width: "95%",
                    },
                }).toString()}
                />
            </picture>
          </div> */}

          <div>
            <div
              className={css({
                position: "relative",
                display: "flex",
                justifyContent: "center",
                alignItems: "center",
                paddingTop: "2rem",
                "@mobile": {
                    paddingTop: "0.5rem",
                }
              }).toString()}
            >
              <div
                className={css({
                  width: "85%",
                  height: "30vw",
                  marginTop: "-0.5rem",
                  backgroundPosition: "center",
                  backgroundRepeat: "no-repeat",
                  backgroundSize: "contain",
                  backgroundImage: `url("${secondBanner}")`,
                  "@mobile": {
                    width: "95%",
                    height: "50vw",
                    marginTop: "0.1rem",
                    backgroundImage: `url("${secondBannerMobile}")`,
                  },
                }).toString()}
              />
            </div>
          </div>
          {/* <div>
            <div
              style={{
                position: "relative",
                display: "flex",
                justifyContent: "center",
                alignItems: "center",
              }}
            >
              <picture>
                <source
                  media="(max-width: 768px)"
                  srcSet={comingSoonMobile}
                />
                <img
                  src={comingSoon}
                  alt="Coming Soon"
                  className={css({
                    width: "auto",
                    maxWidth: "100%",
                    margin: "0 auto",
                    "@mobile": {
                        maxWidth: "90vw",
                        marginTop: "-0.85rem",
                     },
                  }).toString()}
                />
              </picture>
            </div>
          </div> */}
        </Slider>
      </div>
      <Backdrop />
    </Container>
  );
}
