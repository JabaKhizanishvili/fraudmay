import React from "react";
import { Link } from "@inertiajs/inertia-react";
import { MainButton } from "../../components/Button/MainButton";

import Form from "../../components/Form/Form";
import "./FinanceFraud.css";
import Layout from "../../Layouts/Layout";

const Detection = () => {
    return (
        <Layout>
            <div className="finance_fraud pages">
                <img src="/img/ff/bg2.png" alt="" className="background" />
                <div className="wrapper flex">
                    <div className="left">
                        <div className="page_head">
                            <div className="f35">{__("fraud_detection")}</div>
                        </div>
                        <p>{__("fraud_detection_content_1")}</p>
                        <p>{__("fraud_detection_content_2")}</p>
                        <Link
                            className="next_page flex centered"
                            href={route("client.fraud.expertise.index")}
                        >
                            <span>{__("our_epxertise")}</span>{" "}
                            <img
                                src="/img/icons/other/arrow-right2.svg"
                                alt=""
                            />
                        </Link>{" "}
                        <Link
                            className="next_page flex centered"
                            href={route("client.fraud.recovery.index")}
                        >
                            <span> {__("froud_recovery")}</span>{" "}
                            <img
                                src="/img/icons/other/arrow-right2.svg"
                                alt=""
                            />
                        </Link>
                    </div>
                    <div className="right">
                        <img src="/img/ff/2.png" alt="" />
                    </div>
                </div>
            </div>
        </Layout>
    );
};

export default Detection;
