export const upDateQueryParams = (key, params) => {
	const url = new URL(window.location.href);
	url.searchParams.set(key, params);
	window.history.pushState({}, '', url);

    if(params.length === 0){
        url.searchParams.delete(key);
        window.history.pushState({}, '', url);
    }

}

export function onUrlChange(callback) {
    window.addEventListener("popstate", () => callback(window.location.href));
    ["pushState", "replaceState"].forEach(method => {
        const original = history[method];
        history[method] = function (...args) {
            const result = original.apply(this, args);
            callback(window.location.href);
            return result;
        };
    });
}
