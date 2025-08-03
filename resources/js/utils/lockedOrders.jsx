import Cookies from "js-cookie";

export function isOrderLocked(orderId) {
    const locks = JSON.parse(Cookies.get("lockedOrders") || "{}");
    const lockedAt = locks[orderId];

    if (!lockedAt) return false;

    const now = Date.now();
    const timeLocked = 10 * 60 * 1000; // 10 menit

    return now - lockedAt < timeLocked;
}
