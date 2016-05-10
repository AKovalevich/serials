local db = require("lapis.db")
local Model = require("lapis.db.model").Model
local Asset = Model:extend("assets", {
    primary_key = "id",
    relations = {
        {"images", has_one = "images", key = "image_id"}
    }
})

Asset.getByTag = function (tagId, withRelations)
    local res = db.select("* from assets a  \
        inner join asset_tag at ON at.id = a.id \
        where at.tag_id = ? \
        ", tagId)

    if withRelations ~= nil and res ~= nil then
        local preparedAsset = {};
        for key, value in pairs(res) do
            Asset.prepareAllRelations(value)
        end
    end

    return res
end

Asset.getByGenre = function (genreId, withRelations)
    local res = db.select("* from assets a  \
        inner join asset_genre ag ON ag.id = a.id \
        where ag.genre_id = ? \
        ", genreId)

    if withRelations ~= nil and res ~= nil then
        local preparedAsset = {};
        for key, value in pairs(res) do
            Asset.prepareAllRelations(value)
        end
    end

    return res
end

Asset.prepareAllRelations = function(assetInfo)
    assetInfo['genres'] = {};
    if assetInfo["id"] ~= nil then
        ngx.print(assetInfo["image_id"])

        -- Get all genres.
        local tags = db.select("* from genres g  \
            inner join asset_genre ag ON ag.genre_id = g.id \
            where ag.asset_id = ? \
            ", assetInfo["id"])
        if tags ~= nil then
            assetInfo['genres'] = tags;
        end

        -- Get all tags.
        local genres = db.select("* from tags t  \
            inner join asset_tag at ON at.tag_id = t.id \
            where at.asset_id = ? \
            ", assetInfo["id"])
        if genres ~= nil then
            assetInfo['tags'] = genres;
        end

        -- Get images.
        local images = {};
        if assetInfo["image_id"] ~= nil then
        images = db.select("* from images i \
            where i.id = ? \
            ", 3)
        end
        if images ~= nil then
            assetInfo['image'] = images;
        end
    end

    return assetInfo;
end

return {
    Asset = Asset
}
