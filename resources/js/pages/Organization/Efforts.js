import React from "react";
import "./Organization.css";
import Layout from "../../Layouts/Layout";
import Partners from "../../components/Partners/Partners";
import { FormBox } from "../../components/Form/Form";
const Efforts = () => {
    return (
        <Layout>
            <div className=" organization efforts">
                <img src="/img/bgs/6.png" alt="" className="showcase_img" />
                <div className="container">
                    <div className="heading">
                        <div className="bgd_text">
                            Payment fraud detection and solution
                        </div>
                        <div className="f35">{__("our_efforts")}</div>
                        <p>
                            Millions of companies of all sizes—from startups to
                            Fortune 500s—use our software and APIs to accept
                            payments, send payouts, and manage their businesses
                            online.
                        </p>
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
                <div style={{ background: "#F1F3F9", padding: "25px 0" }}>
                    <div className="container" style={{ margin: "0 auto" }}>
                        <img src="/img/other/8.png" alt="" />
                    </div>
                </div>
                <div className="we_understand">
                    <img src="/img/bgs/7.png" className="background" alt="" />
                    <div className="wrapper flex">
                        <div className="text">
                            <div className="f35">
                                We understand your{" "}
                                <span style={{ color: "#377DFF" }}>Pain</span>{" "}
                            </div>
                            <p>
                                Companies usually try many different providers
                                to meet various issues, such as the overall lack
                                of information, poor global coverage, manual
                                profile review, and low pass rates. Not to
                                mention the difficulties that arise when
                                companies coordinate verification rules with
                                their providers.
                            </p>
                            <p>
                                Say hello to fast and transparent checks, put
                                together through a people-friendly interface
                                that allows one to monitor various pre-built or
                                customized parameters while analyzing and
                                improving workflows.
                            </p>
                        </div>
                        <img src="/img/other/9.png" alt="" />
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

export default Efforts;
