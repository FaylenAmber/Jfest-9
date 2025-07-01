import { css, styled } from "@/root/stitches.config";
import { Title } from "@/components/title";

// import { ReactComponent as TelegramIcon } from "@/assets/icons/telegram.svg";
import { ReactComponent as WhatsappIcon } from "@/assets/icons/whatsapp.svg";

const contacts = [
    {
        id: 1,
        label: "Mahesa (081339397007)",
        href: "https://wa.me/+6281339397007?text=hallo%20kak%20Esaa%2C%20saya%20ingin%20bertanya%20nih.%20",
        Icon: WhatsappIcon,
    },
    {
        id: 2,
        label: "Surya (085737243978)",
        href: "https://wa.me/+6285737243978?text=Hai%20kak%20Angga%2C%20saya%20ingin%20bertanya%20nih.%20",
        Icon: WhatsappIcon,
    },
];

const SocialLink = styled("a", {
    display: "flex",
    alignItems: "center",
    justifyContent: "flex-start",
    gap: "1rem",
    color: "$white",
    fontFamily: "$main",
    letterSpacing: 2,
    textDecoration: "none",
    fontSize: "1vw",
    textDecorationColor: "transparent",
    "&:hover": {
        textDecoration: "underline",
        textDecorationColor: "$white",
    },
    "& > svg": {
        width: "1.45rem",
    },
    "@mobile": {
        fontSize: "1rem",
    }
});

export default function FooterContacts() {
    return (
        <section
            className={css({
                display: "flex",
                flexDirection: "column",
                alignItems: "flex-start",
                gridColumn: "7 / 10",
                paddingTop: "9rem",
                gap: "1.5rem",
                zIndex: 2,
                "@tablet": { gridColumn: "1 / 7", paddingTop: "1.5rem" },
                "@mobile": { gridColumn: "1 / -1", paddingTop: "1.5rem" },
            }).toString()}
        >
            <Title order={2} css={{ fontSize: "1.25rem", color: "$white" }}>
                Contact Us
            </Title>
            <div
                className={css({
                    display: "flex",
                    flexDirection: "column",
                    gap: "1.25rem",
                }).toString()}
            >
                {contacts.map((contact) => (
                    <SocialLink
                        key={contact.id}
                        href={contact.href}
                        target="_blank"
                    >
                        <contact.Icon />
                        <span>{contact.label}</span>
                    </SocialLink>
                ))}
            </div>
        </section>
    );
}
