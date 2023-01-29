const fs = require("fs");
const { promises: fsPromises } = require("fs");
const path = require("path");

const cutoff = 200 * 1000;

// cities from https://github.com/lmfmaier/cities-json
fs.readFile(
    path.join(__dirname, "cities500.json"),
    "utf8",
    async (err, data) => {
        if (err) throw err;

        const cities = JSON.parse(data);

        let filteredCities = cities.filter((city) => city.pop > cutoff);

        // countries and continents from https://github.com/annexare/Countries
        const countries = JSON.parse(
            await fsPromises.readFile(
                path.join(__dirname, "countries.json"),
                "utf8"
            )
        );
        const continents = JSON.parse(
            await fsPromises.readFile(
                path.join(__dirname, "continents.json"),
                "utf8"
            )
        );

        filteredCities = filteredCities.map((city) => {
            const countryObject = countries[city.country];
            if (!countryObject) {
                return;
            }
            const { continent: continentCode, name: fullCountry } =
                countryObject;
            const continent = continents[continentCode];
            return {
                ...city,
                countryCode: city.country,
                country: fullCountry,
                continent,
            };
        });

        const filteredCitiesJSON = JSON.stringify(filteredCities, null, 4);

        fs.writeFile(
            path.join(__dirname, "cities.json"),
            filteredCitiesJSON,
            "utf8",
            (err) => {
                if (err) throw err;
                console.log(
                    `cities.json now contains ${filteredCities.length} cities with population ${cutoff} or more.`
                );
            }
        );
    }
);
