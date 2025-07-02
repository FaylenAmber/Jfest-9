import Cookies from "js-cookie";

export function isOrderLocked(orderId) {
    const locks = JSON.parse(Cookies.get("lockedOrders") || "{}");
    const lockedAt = locks[orderId];

    if (!lockedAt) return false;

    const now = Date.now();
    const oneHour = 1 * 60 * 60 * 1000;

    return now - lockedAt < oneHour;
}
