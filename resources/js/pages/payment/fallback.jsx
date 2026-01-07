import { Link } from "@inertiajs/react";

import { css } from "@/root/stitches.config";
import { generateMetadata } from "@/utils/helper";

import withNavbarMobile from "@/hooks/hoc/withNavbarMobile";

import { Button } from "@/components/button";
import { Text } from "@/components/text";
import { Title } from "@/components/title";
import { useEffect } from "react";

function PaymentFallback({ data, links: { historyPageUrl }, meta }) {
    useEffect(() => {
        document.body.style.backgroundColor = "#ffffff";
        return () => {
            document.body.style.backgroundColor = "";
        };
    }, []);

    const expoTicketIds = ["EX1", "EX2", "BD2", "BD3"];

    const expoFormUrl = "https://docs.google.com/forms/d/xxxxxx";

    const tickets = data?.tickets || [];

    const hasExpoTicket = tickets.some(ticket => expoTicketIds.includes(ticket.unique_id));

    return (
        <>
            {generateMetadata(meta.head)}
            <div
                className={css({
                    display: "grid",
                    placeContent: "center",
                    height: "100vh",
                    width: "100%",
                    padding: "0rem 5%",
                    backgroundColor: "$white",
                    textAlign: "center",
                    gap: "1rem",
                }).toString()}
            >
                <Title css={{ color: "$dark" }} order={4}>Terima Kasih!</Title>
                <Text css={{ color: "$dark" }}>
                    Transaksi sedang diproses, silahkan menunggu email konfirmasi selanjutnya dari kami. <br/>
                    Setelah berhasil, informasi transaksi dan tiket dapat diunduh pada halaman 'History'
                </Text>

                <Link href={historyPageUrl} style={{ textDecoration: "none" }}>
                    <Button css={{ margin: "0 auto", marginTop: "1rem" }}>
                        To History
                    </Button>
                </Link>

                {hasExpoTicket && (
                    <a href={expoFormUrl} target="_blank" rel="noopener noreferrer" style={{ textDecoration: "none" }}>
                        <Button
                            color="primary"
                            css={{ margin: "0 auto", marginTop: "1rem" }}
                        >
                            Isi Form EXPO
                        </Button>
                    </a>
                )}

                <Text css={{ color: "$dark", marginTop: "1rem" }}>
                    ID Order: {data.orderId}
                </Text>
                <Text css={{ color: "$red", fontSize: "1rem" }}>
                    * Mohon jangan menghapus item pada halaman 'My Orders' jika transaksi belum dinyatakan selesai. <br/>
                    Hubungi contact person jika belum menerima email konfirmasi dalam jangka waktu 1 jam setelah transaksi dilakukan.
                </Text>
            </div>
        </>
    );
}

export default withNavbarMobile(PaymentFallback);
