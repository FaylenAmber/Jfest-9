import { styled } from "@/root/stitches.config";
import Cookies from "js-cookie";
import { useState } from "react";

import { Button } from "@/components/button";
import { Text } from "@/components/text";

const Container = styled("div", {
    height: "fit-content",
    display: "flex",
    flexDirection: "column",
    gap: "2rem",
    padding: "1.5rem",
    border: "1.5px solid rgba(0, 0, 0, 0.15)",
    borderRadius: 6,
    backgroundColor: "rgba(0, 0, 0, 0.05)",
});

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
    fontWeight: "normal"
});

export default function DetailCard({ fee, totalPrice, redirectToPaymentUrl, order_id }) {
    const [isModalOpen, setIsModalOpen] = useState(false);

    if (!order_id) {
        console.warn("Order ID tidak ditemukan!");
        return;
    }

    const handleContinueToPayment = () => {
        console.log("Order ID untuk dikunci:", order_id);

        const existingLocks = JSON.parse(Cookies.get("lockedOrders") || "{}");

        existingLocks[order_id] = Date.now();

        Cookies.set("lockedOrders", JSON.stringify(existingLocks), { expires: 1 / 12 });

        window.location.href = redirectToPaymentUrl;
    };

    return (
        <>
            <Container>
                <div
                    style={{
                        display: "flex",
                        flexDirection: "column",
                        gap: "1.5rem",
                    }}
                >
                    <Text css={{ fontSize: "2rem", color: "$dark", overflow: "hidden" }}>Detail</Text>
                    <ul
                        style={{
                            display: "flex",
                            flexDirection: "column",
                            gap: "0.5rem",
                            listStyleType: "none",
                        }}
                    >
                        <li style={{ display: "flex", justifyContent: "space-between" }}>
                            <Text css={{ fontSize: "1.25rem", color: "$dark" }}>Subtotal</Text>
                            <Text css={{ fontSize: "1.25rem", color: "$dark" }}>
                                Rp {totalPrice.toLocaleString("id-ID")}
                            </Text>
                        </li>
                        <li style={{ display: "flex", justifyContent: "space-between" }}>
                            <Text css={{ fontSize: "1.25rem", color: "$dark" }}>Admin Fee</Text>
                            <Text css={{ fontSize: "1.25rem", color: "$dark" }}>
                                Rp {fee.toLocaleString("id-ID")}
                            </Text>
                        </li>
                        <li style={{ display: "flex", justifyContent: "space-between", marginTop: "0.5rem" }}>
                            <Text css={{ fontSize: "1.25rem", color: "$dark" }}>Grand Total</Text>
                            <Text css={{ fontSize: "1.25rem", color: "$dark" }}>
                                Rp {(totalPrice + fee).toLocaleString("id-ID")}
                            </Text>
                        </li>
                    </ul>
                </div>

                <Button onClick={() => setIsModalOpen(true)} fullWidth>
                    Cara Pembayaran
                </Button>

                <Button
                    onClick={handleContinueToPayment}
                    fullWidth
                    css={{ marginTop: "-1rem" }}
                >
                    Continue To Payment
                </Button>

            </Container>

            {isModalOpen && (
                <ModalOverlay onClick={() => setIsModalOpen(false)}>
                    <ModalContent onClick={(e) => e.stopPropagation()}>
                        <h2 style={{ color: "$dark" }}>Cara Pembayaran</h2>

                        <div style={{ marginTop: "1rem" }}>
                            <h3 style={{ color: "$dark" }}>GoPay / QRIS</h3>
                            {/* <p>Untuk metode GoPay atau QRIS:</p> */}
                            <ul style={{ color: "$dark", paddingLeft: "1.2rem" }}>
                                <li>
                                    1. <strong>GoPay langsung</strong> – Jika halaman ini dibuka di ponsel yang sudah terpasang aplikasi GoPay, sistem akan otomatis membuka aplikasi GoPay.
                                </li>
                                <li>
                                    2. <strong>Bayar pakai QRIS</strong> – Jika ingin membayar menggunakan QRIS, buka halaman ini di komputer atau laptop. Dengan begitu, kode QR akan muncul di layar.
                                </li>
                                <li>
                                    3. <strong>Pembayaran QRIS</strong> – QRIS dapat dibayar menggunakan aplikasi e-wallet (Dana, OVO, ShopeePay, dll.) atau mobile banking yang mendukung QRIS.
                                </li>
                            </ul>
                        </div>

                        <div style={{ marginTop: "1.5rem" }}>
                            <h3 style={{ color: "$dark" }}>Bank Virtual Account (VA)</h3>
                            <p><strong>Contoh pembayaran jika memilih BNI VA:</strong></p>
                            <ul style={{ color: "$dark", paddingLeft: "1.2rem" }}>
                                <li>
                                    1. <strong>BNI → BNI</strong><br />
                                    Masuk ke BNI Mobile → pilih Transfer → pilih Virtual Account Billing → pilih Input Baru → masukkan nomor VA → bayar.
                                </li>
                                <li>
                                    2. <strong>BRI → BNI</strong><br />
                                    Masuk ke BRImo → pilih Transfer → pilih Tambah Penerima Baru → masukkan Bank Tujuan (BNI) → masukkan nomor VA di kolom Nomor Rekening → pilih metode pembayaran Transfer Online (BI-FAST tidak disarankan) → masukkan nominal → bayar.
                                </li>
                                <li>
                                    3. <strong>BCA → BNI</strong><br />
                                    Masuk ke BCA Mobile → pilih m-Transfer → Antar Bank pada menu Daftar Transfer → masukkan Bank Tujuan (BNI) dan nomor VA sebagai nomor rekening → setelah tersimpan, lakukan transfer seperti biasa.
                                </li>
                            </ul>

                            <p style={{ marginTop: "1rem" }}><strong>Contoh pembayaran jika memilih BRI VA:</strong></p>
                            <ul style={{ color: "$dark", paddingLeft: "1.2rem" }}>
                                <li>
                                    1. <strong>BRI → BRI</strong><br />
                                    Bisa langsung menggunakan BRIVA di BRImo atau ATM BRI.
                                </li>
                                <li>
                                    2. <strong>BNI/BCA → BRI</strong><br />
                                    Gunakan transfer antar bank biasa, dan jika tidak berhasil, coba metode Transfer Online daripada BI-FAST.
                                </li>
                            </ul>
                        </div>

                        <div style={{ display: "flex", justifyContent: "center", marginTop: "1.5rem" }}>
                            <Button onClick={() => setIsModalOpen(false)}>Tutup</Button>
                        </div>
                    </ModalContent>
                </ModalOverlay>
            )}
        </>
    );
}
