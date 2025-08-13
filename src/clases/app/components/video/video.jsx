const VideoPlayer = ({ videoUrl }) => {
  if (!videoUrl) {
    return ;
  }

  return (
	<div className="video-container" style={{ position: "relative", paddingBottom: "56.25%", height: "100%", overflow: "hidden" }}>
      <iframe
        src={videoUrl}
        loading="lazy"
        style={{
          position: "absolute",
          top: 0,
          left: 0,
          width: "100%",
          height: "100%",
          border: "none",
        }}
        allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;"
        allowFullScreen
        title="Video"
      ></iframe>
    </div>
  );
};

export default VideoPlayer;
