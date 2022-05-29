import React from "react";
import "./Partners.css";

const Partners = () => {
    const partners = Array.from(Array(8).keys());
    return (
        <div className="partners_comp wrapper">
            <div className="f35">
                Trusted by{" "}
                <span style={{ color: "#377DFF" }}>1000+ clients</span>
            </div>
            <div className="flex line">
                {partners.map((item, index) => {
                    return (
                        <div key={index} className="part_img flex centered">
                            <img src={`/img/partners/${item + 1}.png`} alt="" />
                        </div>
                    );
                })}
            </div>
        </div>
    );
};

export default Partners;
