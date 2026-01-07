import { usePage } from "@inertiajs/react";
import { useEffect, useState } from "react";
import { styled } from "@/root/stitches.config";
import { toast } from "react-toastify";

import { generateMetadata } from "@/utils/helper";

import Hero from "./partials/Hero";
import Hightlight from "./partials/Highlight";
import Activities from "./partials/Activities";

import withNavbarMobile from "@/hooks/hoc/withNavbarMobile";
import { Button } from "@/components/button";
import { Text } from "@/components/text";


const ModalOverlay = styled("div", {
    position: "fixed",
    top: 0,
    left: 0,
    width: "100vw",
    height: "100vh",
    backgroundColor: "rgba(0, 0, 0, 0.5)",
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
    zIndex: 9999,
});

const ModalContent = styled("div", {
    backgroundColor: "#fff",
    padding: "2rem",
    borderRadius: 8,
    maxWidth: "500px",
    width: "90%",
    boxShadow: "0 4px 20px rgba(0,0,0,0.2)",
    color: "$dark",
    maxHeight: "80vh",
    overflowY: "auto",
    fontFamily: "$popup",
    fontWeight: "normal",
    position: "relative",
    animation: "fadeIn 0.25s ease-out",
    "@keyframes fadeIn": {
        from: { opacity: 0, transform: "scale(0.95)" },
        to: { opacity: 1, transform: "scale(1)" },
    },
});

const Paragraph = styled("p", {
  fontSize: "1rem",
  lineHeight: 1.6,
  color: "$dark",
  marginTop: "1rem",
//   textAlign: "justify",
  "@mobile": {
    fontSize: "0.85rem",
  },
});

const List = styled("ul", {
  marginTop: "0.75rem",
  paddingLeft: "0",
  listStyleType: "disc",
  color: "$dark",
  li: {
    marginLeft: "0",
    marginTop: "0.3rem",
    lineHeight: 1.5,
  },
  "@mobile": {
    fontSize: "0.85rem",
  },
});


function HomePage({ activities, competitions, meta }) {
    const { flash } = usePage().props;
    const [isModalOpen, setIsModalOpen] = useState(true);

    useEffect(() => {
        if (flash.message) return toast(flash.message);
    }, [flash]);

    return (
        <>
            {generateMetadata(meta.head)}
            <Hero />
            <Hightlight />
            <Activities activities={activities} competitions={competitions} />

            {isModalOpen && (
                <ModalOverlay onClick={() => setIsModalOpen(false)}>
                    <ModalContent onClick={(e) => e.stopPropagation()}>
                        <button
                            onClick={() => setIsModalOpen(false)}
                            style={{
                                position: "absolute",
                                top: "0.75rem",
                                right: "1rem",
                                fontSize: "1.5rem",
                                fontWeight: "bold",
                                color: "#555",
                                background: "none",
                                border: "none",
                                cursor: "pointer",
                            }}
                        >
                            ×
                        </button>

                        <Text
                            css={{
                                fontSize: "1.5rem",
                                fontWeight: "600",
                                textAlign: "center",
                                color: "$dark",
                                marginBottom: "1rem",
                            }}
                        >
                            📢 Pengumuman Penting
                        </Text>

                        <div>
                            <Paragraph>
                                QR Code tiket <b>(JFEST, EXPO, dan OBAKE)</b>, link grup lomba, serta form
                                data diri EXPO tersedia di menu <b>History</b>.
                            </Paragraph>

                            <Paragraph>
                                Silakan login dengan akun yang digunakan saat membeli tiket atau mendaftar
                                lomba, lalu buka menu <b>History</b> di bar atas. Di sana kamu bisa:
                            </Paragraph>

                            <List>
                                <li><strong>1. Mengakses QR Code tiket</strong></li>
                                <li><strong>2. Masuk ke grup lomba (jika mendaftar)</strong></li>
                                <li><strong>3. Mengisi form data diri EXPO (jika membeli)</strong></li>
                            </List>
                        </div>

                        <div
                            style={{
                                display: "flex",
                                justifyContent: "center",
                                marginTop: "1.5rem",
                            }}
                        >
                            <Button onClick={() => setIsModalOpen(false)}>
                                Mengerti
                            </Button>
                        </div>
                    </ModalContent>
                </ModalOverlay>
            )}
        </>
    );
}

export default withNavbarMobile(HomePage);
