import { useState } from "react";

function ValidationImage({ src, fallback, alt }) {
  const [imgSrc, setImgSrc] = useState(src);

  return (
    <img
      src={imgSrc}
      alt={alt}
      onError={() => setImgSrc(fallback)}
      className="card-list__img-src"
    />
  );
}

export default ValidationImage;