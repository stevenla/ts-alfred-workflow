all:
	mkdir -p dist
	zip -j -r dist/ts-`cat version.txt`.alfredworkflow src/*