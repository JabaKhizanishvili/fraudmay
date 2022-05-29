export const navbar = [
  {
    name: __("home"),
    link: route("client.home.index"),
  },
  {
    name: __("fraud_cases"),
    link: "/",
    dropdown: [
      {
        name: __("fraud_recovery"),
        link: route("client.fraud.recovery.index"),
      },
      {
        name: __("fraud_detection"),
        link: route("client.fraud.detection.index"),
      },
      {
        name: __("out_experience"),
        link: route("client.fraud.expertise.index"),
      },
    ],
  },
  {
    name: __("financial_regulation"),
    link: "/",
    dropdown: [
      {
        name: __("blockchain_monitoring"),
        link: route("client.blockchain.index"),
      },
      {
        name: __("regulation_entities"),
        link: route("client.entities.index"),
      },
      {
        name: __("regulation_framework"),
        link: route("client.framework.index"),
      },
    ],
  },
  {
    name: __("about_us"),
    link: "/",
    dropdown: [
      {
        name: __("organization"),
        link: route("client.organization.index"),
      },
      {
        name: __("our_offers"),
        link: route("client.efforts.index"),
      },
    ],
  },
  {
    name: __("report_incident"),
    link: route("client.incident.index"),
  },
];
