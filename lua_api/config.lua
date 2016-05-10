local config = require("lapis.config")
-- Database settings
config("local", {
    port = 8080,
    num_workers = 2,
--    code_cache = "on",
    cors_headers = "on",
    app_directory = "/var/www/serials_loc/serials/api/V1/?.lua",
    default_entity_limit = 100,
    mysql = {
        host = "127.0.0.1",
        user = "root",
        password = "",
        database = "serials_dev"
    }
})

config("development", {
    port = 8080,
    num_workers = 2,
    code_cache = "on",
    default_entity_limit = 100,
    app_directory = "/var/www/data/lua_api/V1/?.lua",
    mysql = {
        host = "127.0.0.1",
        user = "root",
        password = "87654321",
        database = "serials_dev"
    }
})