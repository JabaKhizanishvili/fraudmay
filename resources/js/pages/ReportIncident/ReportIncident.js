import React from "react";
import Form, { FormBox } from "../../components/Form/Form";

import "./ReportIncident.css";
import Layout from "../../Layouts/Layout";

const ReportIncident = () => {
    return (
        <Layout>
            <div className="report_incident pages">
                <img src="/img/ff/bg3.png" alt="" className="background" />
                <img src="/img/ff/4.png" alt="" className="abs_img" />

                <div className="wrapper flex">
                    <div className="content">
                        {" "}
                        <div className="f35">{__("report_incident")}</div>
                        <p>{__("report_incident_content_1")}</p>
                        <p>{__("report_incident_content_2")}</p>
                        <p>{__("report_incident_content_3")}</p>
                    </div>
                    <FormBox imgSrc="/img/ff/4.png" />
                </div>
            </div>
        </Layout>
    );
};

export default ReportIncident;
