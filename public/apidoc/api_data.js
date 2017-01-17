define({ "api": [  {    "type": "post",    "url": "/v0/register",    "title": "用户注册",    "name": "register",    "description": "<p>根据请求内容为用户注册。注册成功后，会在数据库中生成用户记录。</p>",    "group": "basic",    "version": "1.0.0",    "examples": [      {        "title": "Example usage:",        "content": "curl -X \"POST\" \"https://med-union-user-plateform.dev/api/v0/register\" \\\n     -H \"Accept: application/json\" \\\n     -H \"Authorization: Bearer [token]\" \\\n     -H \"Content-Type: application/x-www-form-urlencoded; charset=utf-8\"\n     --data-urlencode \"phone=18671616266\"",        "type": "curl"      }    ],    "parameter": {      "fields": {        "Parameter": [          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "phone",            "description": "<p>用户的手机号码。必填。唯一。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "name",            "description": "<p>姓名。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "password",            "description": "<p>密码。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "email",            "description": "<p>用户的电子邮箱密码，用作后台登录，选填。唯一。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "unionid",            "description": "<p>用户的unionid。选填。唯一。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "role",            "description": "<p>用户的角色，请依据预定义角色填写。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "remark",            "description": "<p>用户的备注。选填。通用接口的用户来源可以在此注明。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "title",            "description": "<p>用户的职称。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "office",            "description": "<p>用户的科室。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "province",            "description": "<p>用户的省份。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "city",            "description": "<p>用户的城市。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "hospital_name",            "description": "<p>用户的医院名称。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "upper_user_phone",            "description": "<p>用户的上级用户电话，依据此建立关联关系。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "upper_user_remark",            "description": "<p>用户的上级用户备注。选填。</p>"          }        ]      },      "examples": [        {          "title": "Request-Example:",          "content": "{\n  \"phone\": \"18812345678\",\n  \"name\": \"张三\",\n  \"password\": \"123456\",\n  \"email\": \"abc@foxmail.com\",\n  \"unionid\": \"QWERTYUADFAFALDKFJLKJOIAFJLJDSKJFADAFA\"\n}",          "type": "json"        }      ]    },    "success": {      "fields": {        "Success 200": [          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "status",            "description": "<p>自定义状态码，这里总是显示&quot;ok&quot;.</p>"          },          {            "group": "Success 200",            "type": "Number",            "optional": false,            "field": "user_id",            "description": "<p>创建用户的id</p>"          }        ]      },      "examples": [        {          "title": "Success-Response:",          "content": "HTTP/1.1 200 OK\n{\n  \"status\": \"ok\",\n  \"user_id\": 1\n}",          "type": "json"        }      ]    },    "error": {      "examples": [        {          "title": "Error-422:",          "content": "HTTP/1.1 422 Unprocessable Entity\n{\n  \"phone\": [\n     \"电话 不能为空。\"\n  ]\n}",          "type": "json"        },        {          "title": "Error-401:",          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"error\":\"Unauthenticated.\"\n}",          "type": "json"        },        {          "title": "Error-403:",          "content": "HTTP/1.1 403 Forbidden\nForbidden",          "type": "text"        }      ]    },    "filename": "app/Http/Controllers/ThirdPartyInterfaces/V0/RegisterInterfaceController.php",    "groupTitle": "basic",    "header": {      "fields": {        "": [          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/json\""            ],            "optional": false,            "field": "Accept",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"Bearer [token]\""            ],            "optional": false,            "field": "Authorization",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/x-www-form-urlencoded; charset=utf-8\""            ],            "optional": false,            "field": "ContentType",            "description": ""          }        ]      },      "examples": [        {          "title": "Header-Example:",          "content": "{\n  \"Accept\": \"application/json\",\n  \"Authorization\": \"Bearer [token]\",\n  \"Content-Type\": \"application/x-www-form-urlencoded; charset=utf-8\"\n}",          "type": "json"        }      ]    }  },  {    "type": "get",    "url": "/v0/test",    "title": "测试接入",    "name": "test",    "description": "<p>测试接入是否成功。</p>",    "group": "basic",    "version": "1.0.0",    "examples": [      {        "title": "Example usage:",        "content": "curl -X \"GET\" \"https://med-union-user-plateform.dev/api/v0/test\" \\\n     -H \"Accept: application/json\" \\\n     -H \"Authorization: Bearer [token]\" \\\n     -H \"Content-Type: application/x-www-form-urlencoded; charset=utf-8\"",        "type": "curl"      }    ],    "success": {      "fields": {        "Success 200": [          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "status",            "description": "<p>自定义状态码，这里总是显示&quot;ok&quot;.</p>"          }        ]      },      "examples": [        {          "title": "Success-Response:",          "content": "HTTP/1.1 200 OK\n{\n  \"status\": \"ok\",\n  \"message\": \"接入成功！欢迎使用迈德api！\"\n}",          "type": "json"        }      ]    },    "filename": "app/Http/Controllers/ThirdPartyInterfaces/V0/TestConnectionInterfaceController.php",    "groupTitle": "basic",    "header": {      "fields": {        "": [          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/json\""            ],            "optional": false,            "field": "Accept",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"Bearer [token]\""            ],            "optional": false,            "field": "Authorization",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/x-www-form-urlencoded; charset=utf-8\""            ],            "optional": false,            "field": "ContentType",            "description": ""          }        ]      },      "examples": [        {          "title": "Header-Example:",          "content": "{\n  \"Accept\": \"application/json\",\n  \"Authorization\": \"Bearer [token]\",\n  \"Content-Type\": \"application/x-www-form-urlencoded; charset=utf-8\"\n}",          "type": "json"        }      ]    },    "error": {      "examples": [        {          "title": "Error-401:",          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"error\":\"Unauthenticated.\"\n}",          "type": "json"        },        {          "title": "Error-403:",          "content": "HTTP/1.1 403 Forbidden\nForbidden",          "type": "text"        }      ]    }  },  {    "type": "post",    "url": "/v1/consume",    "title": "消费",    "name": "consume",    "description": "<p>用户消费迈豆接口。调用此接口，传入消费迈豆数值，为用户扣减迈豆。</p>",    "group": "ohmate",    "version": "1.0.0",    "examples": [      {        "title": "Example usage:",        "content": "curl -X \"POST\" \"https://med-union-user-plateform.dev/api/v1/consume\" \\\n     -H \"Accept: application/json\" \\\n     -H \"Authorization: Bearer [token]\" \\\n     -H \"Content-Type: application/x-www-form-urlencoded; charset=utf-8\"\n     --data-urlencode \"phone=18671616266\"\n     --data-urlencode \"multiplicant=100\"",        "type": "curl"      }    ],    "parameter": {      "fields": {        "Parameter": [          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "phone",            "description": "<p>用户的手机号码。必填。唯一。</p>"          },          {            "group": "Parameter",            "type": "Number",            "optional": false,            "field": "cash_paid_by_beans",            "description": "<p>迈豆抵扣的人民币数额。</p>"          },          {            "group": "Parameter",            "type": "Number",            "optional": false,            "field": "cash_paid",            "description": "<p>实际支付的人民币数额。</p>"          },          {            "group": "Parameter",            "type": "Boolean",            "optional": false,            "field": "is_first_cash_consume",            "description": "<p>是否激活首单消费上级返迈豆。只能是1或0，默认是0。</p>"          }        ]      },      "examples": [        {          "title": "Request-Example:",          "content": "{\n  \"phone\": \"18812345678\",\n  \"cash_paid_by_beans\": 100\n  \"cash_paid\": 100\n}",          "type": "json"        }      ]    },    "success": {      "fields": {        "Success 200": [          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "status",            "description": "<p>自定义状态码，这里总是显示&quot;ok&quot;.</p>"          },          {            "group": "Success 200",            "type": "Number",            "optional": false,            "field": "bean_rest",            "description": "<p>剩余迈豆数。</p>"          }        ]      },      "examples": [        {          "title": "Success-Response:",          "content": "HTTP/1.1 200 OK\n{\n  \"status\": \"ok\",\n  \"bean_rest\": 1000\n}",          "type": "json"        }      ]    },    "error": {      "examples": [        {          "title": "Error-422:",          "content": "HTTP/1.1 422 Unprocessable Entity\n{\n  \"phone\": [\n     \"电话 不能为空。\"\n  ]\n}",          "type": "json"        },        {          "title": "Error-422:",          "content": "HTTP/1.1 422 Unprocessable Entity\n{\n  \"phone\": [\n     \"电话 不存在。\"\n  ]\n}",          "type": "json"        },        {          "title": "Error-500",          "content": "HTTP/1.1 500 Internal Server Error\n{\n  \"message\": \"用户迈豆不足\",\n  \"status\": \"error\"\n}",          "type": "json"        },        {          "title": "Error-401:",          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"error\":\"Unauthenticated.\"\n}",          "type": "json"        },        {          "title": "Error-403:",          "content": "HTTP/1.1 403 Forbidden\nForbidden",          "type": "text"        }      ]    },    "filename": "app/Http/Controllers/ThirdPartyInterfaces/V1/ConsumeInterfaceController.php",    "groupTitle": "ohmate",    "header": {      "fields": {        "": [          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/json\""            ],            "optional": false,            "field": "Accept",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"Bearer [token]\""            ],            "optional": false,            "field": "Authorization",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/x-www-form-urlencoded; charset=utf-8\""            ],            "optional": false,            "field": "ContentType",            "description": ""          }        ]      },      "examples": [        {          "title": "Header-Example:",          "content": "{\n  \"Accept\": \"application/json\",\n  \"Authorization\": \"Bearer [token]\",\n  \"Content-Type\": \"application/x-www-form-urlencoded; charset=utf-8\"\n}",          "type": "json"        }      ]    }  },  {    "type": "post",    "url": "/v1/learn",    "title": "用户参与学习",    "name": "learn",    "description": "<p>用户参与学习，通过此接口上报给用户中心，用户中心依据策略给该用户发放迈豆，并且将学习行为纳入统计。学习返迈豆每日有次数限制。正常情况下每次用户学习（不管是否达到返迈豆的限制）都应该调用此接口。</p>",    "group": "ohmate",    "version": "1.0.0",    "examples": [      {        "title": "Example usage:",        "content": "curl -X \"POST\" \"https://med-union-user-plateform.dev/api/v1/learn\" \\\n     -H \"Accept: application/json\" \\\n     -H \"Authorization: Bearer [token]\" \\\n     -H \"Content-Type: application/x-www-form-urlencoded; charset=utf-8\"\n     --data-urlencode \"phone=18671616266\"",        "type": "curl"      }    ],    "parameter": {      "fields": {        "Parameter": [          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "phone",            "description": "<p>用户的手机号码。必填。唯一。</p>"          }        ]      },      "examples": [        {          "title": "Request-Example:",          "content": "{\n  \"phone\": \"18812345678\",\n}",          "type": "json"        }      ]    },    "success": {      "fields": {        "Success 200": [          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "status",            "description": "<p>自定义状态码，这里总是显示&quot;ok&quot;.仅当项目迈豆不足时显示&quot;warning&quot;。</p>"          },          {            "group": "Success 200",            "type": "Number",            "optional": false,            "field": "chance_remains_today",            "description": "<p>今天通过此接口还能获得几次迈豆。当显示0时，如果你再次为当前用户调用此接口，则不会获得迈豆。</p>"          }        ]      },      "examples": [        {          "title": "Success-Response:",          "content": "HTTP/1.1 200 OK\n{\n  \"status\": \"ok\",\n  \"chance_remains_today\": 4\n}",          "type": "json"        }      ]    },    "error": {      "examples": [        {          "title": "Error-422:",          "content": "HTTP/1.1 422 Unprocessable Entity\n{\n  \"phone\": [\n     \"电话 不能为空。\"\n  ]\n}",          "type": "json"        },        {          "title": "Error-422:",          "content": "HTTP/1.1 422 Unprocessable Entity\n{\n  \"phone\": [\n     \"电话 不存在。\"\n  ]\n}",          "type": "json"        },        {          "title": "Error-401:",          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"error\":\"Unauthenticated.\"\n}",          "type": "json"        },        {          "title": "Error-403:",          "content": "HTTP/1.1 403 Forbidden\nForbidden",          "type": "text"        }      ]    },    "filename": "app/Http/Controllers/ThirdPartyInterfaces/V1/LearnInterfaceController.php",    "groupTitle": "ohmate",    "header": {      "fields": {        "": [          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/json\""            ],            "optional": false,            "field": "Accept",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"Bearer [token]\""            ],            "optional": false,            "field": "Authorization",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/x-www-form-urlencoded; charset=utf-8\""            ],            "optional": false,            "field": "ContentType",            "description": ""          }        ]      },      "examples": [        {          "title": "Header-Example:",          "content": "{\n  \"Accept\": \"application/json\",\n  \"Authorization\": \"Bearer [token]\",\n  \"Content-Type\": \"application/x-www-form-urlencoded; charset=utf-8\"\n}",          "type": "json"        }      ]    }  },  {    "type": "post",    "url": "/v1/modify-bean",    "title": "修改用户迈豆",    "name": "modify_bean",    "description": "<p>为用户修改迈豆，计为易康伴侣推广行为发放的迈豆。</p>",    "group": "ohmate",    "version": "1.0.0",    "examples": [      {        "title": "Example usage:",        "content": "curl -X \"POST\" \"https://med-union-user-plateform.dev/api/v1/modify-bean\" \\\n     -H \"Accept: application/json\" \\\n     -H \"Authorization: Bearer [token]\" \\\n     -H \"Content-Type: application/x-www-form-urlencoded; charset=utf-8\"\n     --data-urlencode \"phone=18671616266\"\n     --data-urlencode \"bean=1000\"",        "type": "curl"      }    ],    "parameter": {      "fields": {        "Parameter": [          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "phone",            "description": "<p>用户的手机号码。必填。唯一。</p>"          },          {            "group": "Parameter",            "type": "Number",            "optional": false,            "field": "bean",            "description": "<p>迈豆数量，目前只允许1-1000000之间的值。</p>"          }        ]      },      "examples": [        {          "title": "Request-Example:",          "content": "{\n  \"phone\": \"18812345678\",\n  \"bean\": 1000\n}",          "type": "json"        }      ]    },    "success": {      "fields": {        "Success 200": [          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "status",            "description": "<p>自定义状态码，成功时显示&quot;ok&quot;.</p>"          },          {            "group": "Success 200",            "type": "Number",            "optional": false,            "field": "beans_after",            "description": "<p>修改后用户迈豆</p>"          }        ]      },      "examples": [        {          "title": "Success-Response:",          "content": "HTTP/1.1 200 OK\n{\n  \"status\": \"ok\",\n  \"beans_after\": 1000\n}",          "type": "json"        }      ]    },    "error": {      "examples": [        {          "title": "Error-422:",          "content": "HTTP/1.1 422 Unprocessable Entity\n{\n  \"phone\": [\n     \"电话 不能为空。\"\n  ]\n}",          "type": "json"        },        {          "title": "Error-401:",          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"error\":\"Unauthenticated.\"\n}",          "type": "json"        },        {          "title": "Error-403:",          "content": "HTTP/1.1 403 Forbidden\nForbidden",          "type": "text"        }      ]    },    "filename": "app/Http/Controllers/ThirdPartyInterfaces/V1/ModifyBeanInterfaceController.php",    "groupTitle": "ohmate",    "header": {      "fields": {        "": [          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/json\""            ],            "optional": false,            "field": "Accept",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"Bearer [token]\""            ],            "optional": false,            "field": "Authorization",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/x-www-form-urlencoded; charset=utf-8\""            ],            "optional": false,            "field": "ContentType",            "description": ""          }        ]      },      "examples": [        {          "title": "Header-Example:",          "content": "{\n  \"Accept\": \"application/json\",\n  \"Authorization\": \"Bearer [token]\",\n  \"Content-Type\": \"application/x-www-form-urlencoded; charset=utf-8\"\n}",          "type": "json"        }      ]    }  },  {    "type": "get",    "url": "/v1/query-user-information",    "title": "查询用户信息",    "name": "query_user_information",    "description": "<p>查询用户信息接口。</p>",    "group": "ohmate",    "version": "1.0.0",    "examples": [      {        "title": "Example usage:",        "content": "curl -X \"GET\" \"https://med-union-user-plateform.dev/api/v1/query-user-information\" \\\n     -H \"Accept: application/json\" \\\n     -H \"Authorization: Bearer [token]\" \\\n     -H \"Content-Type: application/x-www-form-urlencoded; charset=utf-8\"\n     --data-urlencode \"phone=18671616266\"",        "type": "curl"      }    ],    "parameter": {      "fields": {        "Parameter": [          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "phone",            "description": "<p>用户的手机号码。必填。唯一。</p>"          }        ]      },      "examples": [        {          "title": "Request-Example:",          "content": "{\n  \"phone\": \"18812345678\",\n}",          "type": "json"        }      ]    },    "success": {      "fields": {        "Success 200": [          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "status",            "description": "<p>自定义状态码，这里总是显示&quot;ok&quot;.</p>"          },          {            "group": "Success 200",            "type": "Array",            "optional": false,            "field": "result",            "description": "<p>查询结果，是一个json数组。具体字段见下面的示例。</p>"          },          {            "group": "Success 200",            "type": "Number",            "optional": false,            "field": "result.id",            "description": "<p>所查询用户id。</p>"          },          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "result.openid",            "description": "<p>所查询用户openid。由于要适用多公众平台，该字段可能会在下一版有所调整。</p>"          },          {            "group": "Success 200",            "type": "Number",            "optional": false,            "field": "result.phone",            "description": "<p>所查询用户电话。</p>"          },          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "result.name",            "description": "<p>所查询用户姓名。</p>"          },          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "result.email",            "description": "<p>所查询用户email。</p>"          },          {            "group": "Success 200",            "type": "Array",            "optional": false,            "field": "result.profile",            "description": "<p>所查询用户个人资料，包含字段见下面示例。</p>"          },          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "result.profile.role",            "description": "<p>所查询用户id。</p>"          },          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "result.profile.title",            "description": "<p>所查询用户职称。</p>"          },          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "result.profile.office",            "description": "<p>所查询用户科室。</p>"          },          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "result.profile.province",            "description": "<p>所查询用户省份。</p>"          },          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "result.profile.city",            "description": "<p>所查询用户城市。</p>"          },          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "result.profile.hospital_name",            "description": "<p>所查询用户医院名称。</p>"          },          {            "group": "Success 200",            "type": "Array",            "optional": false,            "field": "result.bean",            "description": "<p>用户迈豆。</p>"          },          {            "group": "Success 200",            "type": "Number",            "optional": false,            "field": "result.bean.number",            "description": "<p>用户剩余迈豆数。</p>"          }        ]      },      "examples": [        {          "title": "Success-Response:",          "content": "HTTP/1.1 200 OK\n{\n  \"status\": \"ok\",\n  \"result\": {\n    \"id\": 15,\n    \"openid\": null,\n    \"unionid\": null,\n    \"phone\": \"18671616266\",\n    \"name\": null,\n    \"email\": null,\n    \"profile\": {\n      \"role\": \"主任医师\",\n      \"title\": null,\n      \"office\": null,\n      \"province\": null,\n      \"city\": null,\n      \"hospital_name\": null\n    },\n    \"bean\": {\n      \"number\": \"6240.00\"\n    }\n  }\n}",          "type": "json"        }      ]    },    "error": {      "examples": [        {          "title": "Error-422:",          "content": "HTTP/1.1 422 Unprocessable Entity\n{\n  \"phone\": [\n     \"电话 不能为空。\"\n  ]\n}",          "type": "json"        },        {          "title": "Error-422:",          "content": "HTTP/1.1 422 Unprocessable Entity\n{\n  \"phone\": [\n     \"电话 不存在。\"\n  ]\n}",          "type": "json"        },        {          "title": "Error-401:",          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"error\":\"Unauthenticated.\"\n}",          "type": "json"        },        {          "title": "Error-403:",          "content": "HTTP/1.1 403 Forbidden\nForbidden",          "type": "text"        }      ]    },    "filename": "app/Http/Controllers/ThirdPartyInterfaces/V1/QueryUserInformationInterfaceController.php",    "groupTitle": "ohmate",    "header": {      "fields": {        "": [          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/json\""            ],            "optional": false,            "field": "Accept",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"Bearer [token]\""            ],            "optional": false,            "field": "Authorization",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/x-www-form-urlencoded; charset=utf-8\""            ],            "optional": false,            "field": "ContentType",            "description": ""          }        ]      },      "examples": [        {          "title": "Header-Example:",          "content": "{\n  \"Accept\": \"application/json\",\n  \"Authorization\": \"Bearer [token]\",\n  \"Content-Type\": \"application/x-www-form-urlencoded; charset=utf-8\"\n}",          "type": "json"        }      ]    }  },  {    "type": "post",    "url": "/v1/register",    "title": "用户注册",    "name": "register",    "description": "<p>根据请求内容为用户注册。注册成功后，会在数据库中生成用户记录。</p>",    "group": "ohmate",    "version": "1.0.0",    "examples": [      {        "title": "Example usage:",        "content": "curl -X \"POST\" \"https://med-union-user-plateform.dev/api/v1/register\" \\\n     -H \"Accept: application/json\" \\\n     -H \"Authorization: Bearer [token]\" \\\n     -H \"Content-Type: application/x-www-form-urlencoded; charset=utf-8\"\n     --data-urlencode \"phone=18671616266\"",        "type": "curl"      }    ],    "parameter": {      "fields": {        "Parameter": [          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "phone",            "description": "<p>用户的手机号码。必填。唯一。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "name",            "description": "<p>姓名。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "password",            "description": "<p>密码。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "email",            "description": "<p>用户的电子邮箱密码，用作后台登录，选填。唯一。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "unionid",            "description": "<p>用户的unionid。选填。唯一。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "role",            "description": "<p>用户的角色，请依据预定义角色填写。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "remark",            "description": "<p>用户的备注。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "title",            "description": "<p>用户的职称。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "office",            "description": "<p>用户的科室。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "province",            "description": "<p>用户的省份。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "city",            "description": "<p>用户的城市。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "hospital_name",            "description": "<p>用户的医院名称。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "upper_user_phone",            "description": "<p>用户的上级用户电话，依据此建立关联关系。选填。</p>"          },          {            "group": "Parameter",            "type": "String",            "optional": false,            "field": "upper_user_remark",            "description": "<p>用户的上级用户备注。选填。</p>"          }        ]      },      "examples": [        {          "title": "Request-Example:",          "content": "{\n  \"phone\": \"18812345678\",\n  \"name\": \"张三\",\n  \"password\": \"123456\",\n  \"email\": \"abc@foxmail.com\",\n  \"unionid\": \"QWERTYUADFAFALDKFJLKJOIAFJLJDSKJFADAFA\"\n}",          "type": "json"        }      ]    },    "success": {      "fields": {        "Success 200": [          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "status",            "description": "<p>自定义状态码，这里总是显示&quot;ok&quot;.仅当项目迈豆不足时显示&quot;warning&quot;。此时只会注册，不会发放迈豆。</p>"          },          {            "group": "Success 200",            "type": "Number",            "optional": false,            "field": "user_id",            "description": "<p>创建用户的id</p>"          }        ]      },      "examples": [        {          "title": "Success-Response:",          "content": "HTTP/1.1 200 OK\n{\n  \"status\": \"ok\",\n  \"user_id\": 1\n}",          "type": "json"        }      ]    },    "error": {      "examples": [        {          "title": "Error-422:",          "content": "HTTP/1.1 422 Unprocessable Entity\n{\n  \"phone\": [\n     \"电话 不能为空。\"\n  ]\n}",          "type": "json"        },        {          "title": "Error-401:",          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"error\":\"Unauthenticated.\"\n}",          "type": "json"        },        {          "title": "Error-403:",          "content": "HTTP/1.1 403 Forbidden\nForbidden",          "type": "text"        }      ]    },    "filename": "app/Http/Controllers/ThirdPartyInterfaces/V1/RegisterInterfaceController.php",    "groupTitle": "ohmate",    "header": {      "fields": {        "": [          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/json\""            ],            "optional": false,            "field": "Accept",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"Bearer [token]\""            ],            "optional": false,            "field": "Authorization",            "description": ""          },          {            "group": "Header",            "type": "String",            "allowedValues": [              "\"application/x-www-form-urlencoded; charset=utf-8\""            ],            "optional": false,            "field": "ContentType",            "description": ""          }        ]      },      "examples": [        {          "title": "Header-Example:",          "content": "{\n  \"Accept\": \"application/json\",\n  \"Authorization\": \"Bearer [token]\",\n  \"Content-Type\": \"application/x-www-form-urlencoded; charset=utf-8\"\n}",          "type": "json"        }      ]    }  }] });
