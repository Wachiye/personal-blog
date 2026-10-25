export const contact = {
  name: "Jeremiah Siranjofu Wachiye",
  email: "siranjofuw@gmail.com",
  phoneDisplay: "+2547 9098 3123",
  phoneHref: "tel:+254790983123",
  linkedin: "https://www.linkedin.com/in/wachiye-siranjofu/",
  github: "https://github.com/Wachiye",
  site: "https://wachiye.github.io",
};

export type Job = {
  org: string;
  role: string;
  start: string;
  end: string;
  points: string[];
  skills: string[];
};

export const jobs: Job[] = [
  {
    org: "Konvergenze Network Solutions",
    role: "Fullstack Software Developer",
    start: "Nov 2024",
    end: "Present",
    points: [
      "Contributed to TaifaCare HMIS — patient registration, appointments, clinical visits, billing, and reporting.",
      "Implemented healthcare interoperability with FHIR, SHR, and HIE integrations.",
      "Refactored legacy code and improved maintainability, performance, and consistency across core HMIS modules.",
      "Worked with product, clinical, and technical stakeholders to turn healthcare workflows into software.",
      "Built dashboard analytics and key Ministry of Health reports with line lists.",
      "Offered technical support for system issues.",
    ],
    skills: ["FHIR", "Frappe", "Python", "Vue.js", "Tailwind"],
  },
  {
    org: "Doros Ltd",
    role: "Frontend Developer",
    start: "Jul 2024",
    end: "Nov 2024",
    points: [
      "Converted a Next.js page-router project to TypeScript and the Next.js app router.",
      "Improved responsiveness and the general UI.",
      "Handled API integration and error states properly.",
      "Initiated guest management and a blogging feature.",
    ],
    skills: ["Next.js", "Redux", "TypeScript", "REST", "Git"],
  },
  {
    org: "Enatontech",
    role: "Backend Developer",
    start: "Mar 2024",
    end: "May 2024",
    points: [
      "Collaborated on a School Management System REST API.",
      "Initiated an automated payroll module for internal staff, including P9 forms.",
      "Initiated a student–parent contact management module.",
    ],
    skills: ["Node.js", "TypeScript", "PostgreSQL", "RabbitMQ", "REST"],
  },
  {
    org: "Kozi Connect Ltd",
    role: "Solutions Architect",
    start: "Jun 2022",
    end: "Feb 2024",
    points: [
      "Proposed, designed, and initiated an internal ISP billing system.",
      "Facilitated a website chatbot so customer support could move faster.",
      "Designed and initiated the Kozi Environmental Health and Safety management system.",
      "Built a birthday reminder that sends customers an automated message.",
    ],
    skills: ["Spring Boot", "PostgreSQL", "React", "PHP", "MikroTik"],
  },
  {
    org: "Kozi Connect Ltd",
    role: "Web Developer Intern",
    start: "Apr 2022",
    end: "Jun 2022",
    points: [
      "Redesigned, developed, and deployed company websites.",
      "Added a service proximity search module on the company website.",
    ],
    skills: ["PHP", "MySQL", "React", "Node.js", "MongoDB"],
  },
  {
    org: "AIGOT SRL",
    role: "Frontend Developer",
    start: "Mar 2022",
    end: "Jun 2022",
    points: [
      "Created UI components.",
      "Integrated REST APIs.",
      "Reviewed and tested web interfaces.",
    ],
    skills: ["React", "REST", "Git"],
  },
];

export const skillGroups = ["Languages", "Frameworks", "Platforms", "Data", "Craft"] as const;
export type SkillGroup = (typeof skillGroups)[number];

export type Skill = {
  name: string;
  group: SkillGroup;
  where: string;
};

export const skills: Skill[] = [
  {
    name: "Java",
    group: "Languages",
    where: "Egerton academic project (Spring Boot, MySQL) and Spring Boot work at Kozi Connect.",
  },
  {
    name: "JavaScript",
    group: "Languages",
    where: "EUCOSSA module certificate (HTML, CSS, JavaScript), Oct 2019.",
  },
  {
    name: "TypeScript",
    group: "Languages",
    where: "Doros app-router conversion and the Enatontech school API.",
  },
  {
    name: "Python",
    group: "Languages",
    where: "Konvergenze stack on TaifaCare, with Frappe, Vue.js, and FHIR.",
  },
  {
    name: "PHP",
    group: "Languages",
    where: "Kozi Connect websites, billing work, and the internship stack.",
  },
  {
    name: "C#",
    group: "Languages",
    where: "Listed under languages on the résumé.",
  },
  {
    name: "C",
    group: "Languages",
    where: "Listed under languages on the résumé.",
  },
  {
    name: "VB",
    group: "Languages",
    where: "Listed under languages on the résumé.",
  },
  {
    name: "VBA",
    group: "Languages",
    where: "Residents Registration System at Bishop Philip Secondary, with Microsoft Access.",
  },
  {
    name: "HTML",
    group: "Languages",
    where: "EUCOSSA front-end module, Oct 2019, with CSS and JavaScript.",
  },
  {
    name: "CSS",
    group: "Languages",
    where: "EUCOSSA module certificate (HTML, CSS, JavaScript), Oct 2019.",
  },
  {
    name: "Spring Boot",
    group: "Frameworks",
    where: "Kozi Connect systems and the Egerton project-approval system.",
  },
  {
    name: "Node.js",
    group: "Frameworks",
    where: "Enatontech API and the Kozi internship, plus the 2019 Node module.",
  },
  {
    name: "React",
    group: "Frameworks",
    where: "AIGOT SRL, Kozi Connect, and the Egerton academic project.",
  },
  {
    name: "Next.js",
    group: "Frameworks",
    where: "Doros — page router to TypeScript app router, guests, and blogging.",
  },
  {
    name: "Vue.js",
    group: "Frameworks",
    where: "Konvergenze frontend beside Frappe, Python, and Tailwind.",
  },
  {
    name: "FastAPI",
    group: "Frameworks",
    where: "Listed under languages and frameworks on the résumé.",
  },
  {
    name: "Frappe",
    group: "Frameworks",
    where: "TaifaCare HMIS at Konvergenze.",
  },
  {
    name: "Redux",
    group: "Frameworks",
    where: "Client state on the Doros Next.js frontend.",
  },
  {
    name: "Tailwind",
    group: "Frameworks",
    where: "Interface styling on TaifaCare at Konvergenze.",
  },
  {
    name: "Express",
    group: "Frameworks",
    where: "2019 module certificate with Node.js, MongoDB, and MySQL.",
  },
  {
    name: "Heroku",
    group: "Platforms",
    where: "Deployment platform listed with Azure, Vercel, and AWS.",
  },
  {
    name: "Azure",
    group: "Platforms",
    where: "Cloud platform on the résumé.",
  },
  {
    name: "Vercel",
    group: "Platforms",
    where: "Deployment platform on the résumé.",
  },
  {
    name: "AWS",
    group: "Platforms",
    where: "Lambda, Cognito, EC2, S3, API Gateway, and RDS.",
  },
  {
    name: "MikroTik",
    group: "Platforms",
    where: "ISP networking alongside billing and VM work at Kozi Connect.",
  },
  {
    name: "cPanel",
    group: "Platforms",
    where: "Hosting on the Kozi Connect internship websites.",
  },
  {
    name: "PostgreSQL",
    group: "Data",
    where: "Enatontech school API and Kozi Connect billing systems.",
  },
  {
    name: "MySQL",
    group: "Data",
    where: "Egerton project, Kozi internship sites, and the 2019 data module.",
  },
  {
    name: "MongoDB",
    group: "Data",
    where: "Kozi internship stack and the Node/Express certificate module.",
  },
  {
    name: "SQL Server",
    group: "Data",
    where: "Listed with MySQL, PostgreSQL, and MongoDB.",
  },
  {
    name: "RabbitMQ",
    group: "Data",
    where: "Messaging on the Enatontech school-management API.",
  },
  {
    name: "Access",
    group: "Data",
    where: "Residents Registration System at Bishop Philip Secondary, with VBA.",
  },
  {
    name: "FHIR",
    group: "Craft",
    where: "TaifaCare interoperability — FHIR, SHR, and HIE, plus MOH line-list reports.",
  },
  {
    name: "REST APIs",
    group: "Craft",
    where: "Designed and integrated at Enatontech, Doros, AIGOT, and Kozi.",
  },
  {
    name: "UI / UX",
    group: "Craft",
    where: "UI/UX Design listed under technical skills.",
  },
  {
    name: "Agile / Scrum",
    group: "Craft",
    where: "Agile/Scrum Development listed under technical skills.",
  },
  {
    name: "Git",
    group: "Craft",
    where: "Version control listed on the Doros, Enatontech, Kozi Connect, and AIGOT roles.",
  },
];

export const ticker = [
  "FHIR",
  "HMIS",
  "NEXT.JS",
  "SPRING BOOT",
  "PYTHON",
  "VUE",
  "NODE",
  "POSTGRES",
  "AWS",
  "RABBITMQ",
  "REACT",
  "TYPESCRIPT",
  "FRAPPE",
  "TAILWIND",
];

export const systems = [
  {
    name: "TaifaCare HMIS",
    where: "Konvergenze",
    note: "Registration, appointments, visits, billing, FHIR / SHR / HIE, dashboards, and MOH line lists.",
  },
  {
    name: "School Management API",
    where: "Enatontech",
    note: "REST API, automated staff payroll with P9 forms, and a student–parent contact module.",
  },
  {
    name: "ISP Billing System",
    where: "Kozi Connect",
    note: "Proposed, designed, and initiated as an internal billing system for the ISP.",
  },
  {
    name: "EHS Management System",
    where: "Kozi Connect",
    note: "Environmental health and safety management information system.",
  },
  {
    name: "Support Chatbot",
    where: "Kozi Connect",
    note: "Deployed on the company website for faster customer support.",
  },
  {
    name: "Guest & Blog",
    where: "Doros",
    note: "Guest management and blogging on a TypeScript Next.js app router.",
  },
  {
    name: "Academic Project System",
    where: "Egerton",
    note: "Project approval and management — React, Spring Boot, and MySQL.",
  },
  {
    name: "Residents Registration",
    where: "Bishop Philip",
    note: "Secondary-school project in Microsoft Access and VBA, with documentation.",
  },
];

export const education = [
  {
    school: "Egerton University",
    program: "Computer Science",
    start: "Aug 2017",
    end: "Jul 2022",
    points: [
      "Second Class Upper Division.",
      "Modules: DSA, OOP, DBMS, software engineering, computer networks, OS, SDLC, project management.",
      "Project: Academic Project Approval and Management System — React, Spring Boot, MySQL.",
    ],
  },
  {
    school: "Bishop Philip Secondary School",
    program: "Kenya Certificate of Secondary Education",
    start: "Feb 2013",
    end: "Dec 2016",
    points: [
      "GPA 74.9 (A-).",
      "Project: Residents Registration System — Access, VBA, and documentation.",
    ],
  },
];

export const awards = [
  {
    when: "Dec 2023",
    title: "Best Solutions Architect of the Year",
    detail: "Kozi Connect",
  },
  {
    when: "Mar 2022",
    title: "Human-Centered Design",
    detail: "Certificate of completion, Egerton University",
  },
  {
    when: "Oct 2019",
    title: "HTML, CSS, JavaScript",
    detail: "EUCOSSA module, Egerton University",
  },
  {
    when: "Oct 2019",
    title: "Node.js, Express, MongoDB, MySQL",
    detail: "Module certificate",
  },
];

