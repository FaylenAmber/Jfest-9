import { useEffect, useState } from "react";
import { useWindowScroll } from "@uidotdev/usehooks";
import { styled } from "@/root/stitches.config";

import NavbarCta from "./NavbarCta";
import NavbarLogo from "./NavbarLogo";
import NavbarMenu from "./NavbarMenu";

const Container = styled("nav", {
  position: "fixed",
  top: 0,
  left: 0,
  display: "flex",
  alignItems: "center",
  justifyContent: "space-between",
  height: "max-content",
  width: "100%",
  padding: "0vw 5%",
  transition: "all .2s ease-in-out",
  transitionProperty: "backdrop-filter",
  zIndex: 9,
  color: "$white",
  fill: "$white",
  "& > .left": {
    display: "flex",
    alignItems: "center",
    justifyContent: "flex-start",
    gap: "3rem",
    height: "inherit",
    width: "fit-content",
  },
  "& > .right": {
    display: "flex",
    alignItems: "center",
    justifyContent: "flex-end",
    height: "inherit",
    width: "fit-content",
  },
  defaultVariants: {
    px: "desktop",
  },
  "@mobile": {
    top: 14,
  },
});

export default function Navbar({ theme = "dark" }) {
  const [state] = useWindowScroll();
  const [isHome, setIsHome] = useState(true);

  useEffect(() => {
    const path = window.location.pathname;
    setIsHome(path === "/");
  }, []);

  // Styling berdasarkan halaman dan scroll
  const navbarStyle = isHome
    ? (state.y > 20
        ? {
            backdropFilter: "blur(10px)",
            backgroundColor: "rgba(6, 6, 6, 0.5)",
            "@mobile": {
              backdropFilter: "none",
              backgroundColor: "transparent",
            },
          }
        : {
            backgroundColor: "transparent",
          })
    : {
        backgroundColor: "rgba(0, 0, 0, 0.3)", // transparan tapi gelap
        backdropFilter: "none",
        "@mobile": {
            backgroundColor: "transparent",
        },
      };

  return (
    <Container css={navbarStyle}>
      <div className="left">
        <NavbarLogo />
        <NavbarMenu />
      </div>
      <div className="right">
        <NavbarCta theme={theme} />
      </div>
    </Container>
  );
}
