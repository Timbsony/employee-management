create table contract
(
    id     int unsigned auto_increment    not null     primary key,
    farmer_id            int                                 null,
    requisition_cash_id  int                                 null,
    requisition_input_id int                                 null,
    summary              text                                null,
    full_contract_link   text                                null,
    renewal_option       tinyint(1)                          null,
    status               int                                 null,
    created_at           timestamp default CURRENT_TIMESTAMP null,
    updated_at           timestamp default CURRENT_TIMESTAMP null
);

create table farm
(
    id     int unsigned auto_increment    not null     primary key,
    business_name    varchar(255)                        not null,
    legal_owner_name varchar(255)                        not null,
    geo_location_id  varchar(255)                        not null,
    farm_size_ha     double                              not null,
    farm_size_acres  double                              not null,
    created_at       timestamp default CURRENT_TIMESTAMP null,
    updated_at       timestamp default CURRENT_TIMESTAMP null
);

create table farm_enterprise
(
    id     int unsigned auto_increment    not null     primary key,
    farm_id         int                                 not null,
    enterprise_type int                                 not null,
    is_major        tinyint(1)                          not null,
    created_at      timestamp default CURRENT_TIMESTAMP null,
    updated_at      timestamp default CURRENT_TIMESTAMP null
);

create table farmer
(
    id     int unsigned auto_increment    not null     primary key,
    surname             varchar(255)                        not null,
    farm_id              int                                null,
    first_name          varchar(255)                        not null,
    middle_name         varchar(255)                        null,
    alias               varchar(255)                        null,
    national_id         varchar(255)                        not null,
    gender                 varchar(255)                        not null,
    dob                 date                                not null,
    email               varchar(255)                        not null,
    phone_number        varchar(255)                        not null,
    residential_address varchar(255)                        not null,
    postal_address      varchar(255)                        not null,
    image               blob                                null,
    created_at          timestamp default CURRENT_TIMESTAMP null,
    updated_at          timestamp default CURRENT_TIMESTAMP null
);

create table inventory
(
    id     int unsigned auto_increment    not null     primary key,
    input_name varchar(255)                        not null,
    quantity   double                              not null,
    created_at timestamp default CURRENT_TIMESTAMP null,
    updated_at timestamp default CURRENT_TIMESTAMP null
);

create table requisition_cash
(
    id     int unsigned auto_increment    not null     primary key,
    amount_requested               double                              not null,
    reason_for_request             varchar(255)                        not null,
    loan_classification            varchar(255)                        not null,
    interest_rate                  double                              not null,
    payment_period_months          int                                 not null,
    acknowledgement_of_debt_signed tinyint(1)                          not null,
    created_at                     timestamp default CURRENT_TIMESTAMP null,
    updated_at                     timestamp default CURRENT_TIMESTAMP null
);

create table requisition_input
(
    id     int unsigned auto_increment    not null     primary key,
    input_name                     varchar(255)                        not null,
    amount_requested               double                              not null,
    reason_for_request             varchar(255)                        not null,
    loan_classification            varchar(255)                        not null,
    interest_rate                  double                              not null,
    payment_period_months          int                                 not null,
    acknowledgement_of_debt_signed tinyint(1)                          not null,
    created_at                     timestamp default CURRENT_TIMESTAMP null,
    updated_at                     timestamp default CURRENT_TIMESTAMP null
);

create table transaction
(
    id     int unsigned auto_increment    not null     primary key,
    inventory_id     int                                 null,
    quantity         double                              not null,
    transaction_type text                                null,
    created_at       timestamp default CURRENT_TIMESTAMP null,
    updated_at       timestamp default CURRENT_TIMESTAMP null
);

