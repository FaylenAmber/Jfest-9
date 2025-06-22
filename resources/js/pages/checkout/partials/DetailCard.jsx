import { styled } from "@/root/stitches.config";
import Cookies from "js-cookie";

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

export default function DetailCard({ fee, totalPrice, redirectToPaymentUrl, order_id }) {
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
                    <li
                        style={{
                            display: "flex",
                            justifyContent: "space-between",
                            width: "100%",
                        }}
                    >
                        <Text css={{ fontSize: "1.25rem", color: "$dark" }}>Subtotal</Text>
                        <Text css={{ fontSize: "1.25rem", color: "$dark", overflow: "hidden" }}>
                            Rp {totalPrice.toLocaleString("id-ID")}
                        </Text>
                    </li>
                    <li
                        style={{
                            display: "flex",
                            justifyContent: "space-between",
                            width: "100%",
                        }}
                    >
                        <Text css={{ fontSize: "1.25rem", color: "$dark" }}>Admin Fee</Text>
                        <Text css={{ fontSize: "1.25rem", color: "$dark", overflow: "hidden" }}>
                            Rp {fee.toLocaleString("id-ID")}
                        </Text>
                    </li>
                    <li
                        style={{
                            display: "flex",
                            justifyContent: "space-between",
                            width: "100%",
                            marginTop: "0.5rem",
                        }}
                    >
                        <Text css={{ fontSize: "1.25rem", color: "$dark" }}>Grand Total</Text>
                        <Text css={{ fontSize: "1.25rem", color: "$dark", overflow: "hidden" }}>
                            Rp {(totalPrice + fee).toLocaleString("id-ID")}
                        </Text>
                    </li>
                </ul>
            </div>
            <Button onClick={handleContinueToPayment} fullWidth>
                Continue To Payment
            </Button>
        </Container>
    );
}
