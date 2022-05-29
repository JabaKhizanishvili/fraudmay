import React from "react";
import "./Organization.css";
import Layout from "../../Layouts/Layout";
import Partners from "../../components/Partners/Partners";
import { FormBox } from "../../components/Form/Form";

const Organization = () => {
    const timelines = [
        {
            title: "Lorem ipsum",
            para: "They form the basis for the evaluation of the securities sector for the Financial Sector Assessment Programs (FSAPs) of the International Monetary Fund (IMF) and the World Bank. By providing high quality technical assistance, education and training, and research to its members and other regulators, CryptoDetect seeks to build sound global capital markets and a robust global regulatory framework.",
            alignLeft: false,
        },
        {
            title: "Lorem ipsum",
            para: "They form the basis for the evaluation of the securities sector for the Financial Sector Assessment Programs (FSAPs) of the International Monetary Fund (IMF) and the World Bank. By providing high quality technical assistance, education and training, and research to its members and other regulators, CryptoDetect seeks to build sound global capital markets and a robust global regulatory framework.",
            alignLeft: true,
        },
        {
            title: "Lorem ipsum",
            para: "They form the basis for the evaluation of the securities sector for the Financial Sector Assessment Programs (FSAPs) of the International Monetary Fund (IMF) and the World Bank. By providing high quality technical assistance, education and training, and research to its members and other regulators, CryptoDetect seeks to build sound global capital markets and a robust global regulatory framework.",
            alignLeft: false,
        },
        {
            title: "Lorem ipsum",
            para: "They form the basis for the evaluation of the securities sector for the Financial Sector Assessment Programs (FSAPs) of the International Monetary Fund (IMF) and the World Bank. By providing high quality technical assistance, education and training, and research to its members and other regulators, CryptoDetect seeks to build sound global capital markets and a robust global regulatory framework.",
            alignLeft: true,
        },
        {
            title: "Lorem ipsum",
            para: "They form the basis for the evaluation of the securities sector for the Financial Sector Assessment Programs (FSAPs) of the International Monetary Fund (IMF) and the World Bank. By providing high quality technical assistance, education and training, and research to its members and other regulators, CryptoDetect seeks to build sound global capital markets and a robust global regulatory framework.",
            alignLeft: false,
        },
    ];
    return (
        <Layout>
            <div className=" organization">
                <img src="/img/bgs/5.png" alt="" className="showcase_img" />
                <div className="container">
                    <div className="heading">
                        <div className="bgd_text">
                            Payment fraud detection and solution
                        </div>
                        <div className="f35">
                            Several words about company's <br />
                            <span style={{ color: "#377DFF" }}>
                                Main mission
                            </span>
                        </div>
                    </div>
                    <p>
                        CryptoDetect Consulting Incorporation is the
                        international body that brings together the world's
                        securities regulators and is recognized as the global
                        standard setter for the securities sector. CryptoDetect
                        develops, implements and promotes adherence to
                        internationally recognized standards for securities
                        regulation. It works intensively with the G20 and the
                        Financial Stability Board (FSB) on the global regulatory
                        reform agenda.
                    </p>
                    <p>
                        CryptoDetect was established in 2009. Its membership
                        regulates more than 95% of the world's securities
                        markets in more than 130 jurisdictions: securities
                        regulators in emerging markets account for 75% of its
                        ordinary membership. The CryptoDetect Objectives and
                        Principles of Securities Regulation have been endorsed
                        by both the G20 and the FSB as the relevant standards in
                        this area. They are the overarching core principles that
                        guide CryptoDetect in the development and implementation
                        of internationally recognized and consistent standards
                        of regulation, oversight and enforcement.
                    </p>
                    <img src="/img/other/7.png" alt="" />
                    <p>
                        CryptoDetect Consulting Incorporation is the
                        international body that brings together the world's
                        securities regulators and is recognized as the global
                        standard setter for the securities sector. CryptoDetect
                        develops, implements and promotes adherence to
                        internationally recognized standards for securities
                        regulation. It works intensively with the G20 and the
                        Financial Stability Board (FSB) on the global regulatory
                        reform agenda.
                    </p>
                    <p>
                        CryptoDetect was established in 2009. Its membership
                        regulates more than 95% of the world's securities
                        markets in more than 130 jurisdictions: securities
                        regulators in emerging markets account for 75% of its
                        ordinary membership. The CryptoDetect Objectives and
                        Principles of Securities Regulation have been endorsed
                        by both the G20 and the FSB as the relevant standards in
                        this area. They are the overarching core principles that
                        guide CryptoDetect in the development and implementation
                        of internationally recognized and consistent standards
                        of regulation, oversight and enforcement.
                    </p>
                </div>
                <div className="wrapper">
                    <div
                        style={{ color: "#377DFF" }}
                        className="heading bgd_text f35"
                    >
                        Our History
                    </div>
                    <div className="history">
                        <img
                            className="timeline"
                            src="/img/other/history.png"
                            alt=""
                        />
                        <div className="years">
                            {timelines.map((item, index) => {
                                return (
                                    <div
                                        key={index}
                                        className={
                                            item.alignLeft
                                                ? "item left"
                                                : "item right"
                                        }
                                    >
                                        <div className="title">
                                            <span>{`0${index + 1}`}</span>{" "}
                                            {item.title}
                                        </div>
                                        <p>{item.para}</p>
                                    </div>
                                );
                            })}
                        </div>
                    </div>
                </div>
                <Partners />
                <div className="bottom_form">
                    <div className="wrapper ">
                        <img className="shape1" src="/img/ff/bg4.png" alt="" />
                        <div className="f35">
                            Still cant find an answer to your question? <br />
                            feel free to{" "}
                            <span style={{ color: "#377DFF" }}>
                                {" "}
                                Get in touch
                            </span>
                        </div>
                        <FormBox imgSrc="/img/form/1.png" />
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Organization;
