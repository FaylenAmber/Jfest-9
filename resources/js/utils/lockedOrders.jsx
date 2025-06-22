import Cookies from "js-cookie";

export function isOrderLocked(orderId) {
    const locks = JSON.parse(Cookies.get("lockedOrders") || "{}");
    const lockedAt = locks[orderId];

    if (!lockedAt) return false;

    const now = Date.now();
    const twoHours = 2 * 60 * 60 * 1000;

    return now - lockedAt < twoHours;
}
